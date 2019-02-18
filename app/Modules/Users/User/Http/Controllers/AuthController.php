<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Http\Requests\LoginSocialRequest;
use App\Modules\Users\User\Services\SocialServiceFactory;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'socialLogin']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'No such user or email'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @param LoginSocialRequest $request
     * @param string $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Modules\Users\User\Services\SocialServiceException
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function socialLogin(LoginSocialRequest $request, string $service)
    {
        $token = $request->get('token');
        $device = $request->get('device');

        $social = SocialServiceFactory::get($service, $token, $device);

        $userData = $social->getUserData();
        $user = $social->findOrCreateUser($userData);

        $jwtToken = Auth::login($user);

        return $this->respondWithToken($jwtToken);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
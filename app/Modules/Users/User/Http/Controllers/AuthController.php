<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    use AuthResponseTrait;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return Response
     */
    public function login()
    {
        $credentials = request(['phone_number', 'password', 'country_code']);

        if (!$token = auth()->attempt($credentials)) {
            return ResponseBuilder::error(ApiCode::NO_SUCH_USER);
        }
        return ResponseBuilder::success($this->respondWithToken($token));
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function me()
    {
        return ResponseBuilder::success(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return Response
     */
    public function logout()
    {
        auth()->logout();

        return ResponseBuilder::success();
    }

    /**
     * Refresh a token.
     *
     * @return Response
     */
    public function refresh()
    {
        return ResponseBuilder::success(
            $this->getTokenStructure(auth()->refresh())
        );
    }
}
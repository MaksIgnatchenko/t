<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Enums\LoginTypeEnum;
use App\Modules\Users\User\Http\Requests\RegisterRequest;
use App\Modules\Users\User\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    protected function guard(): Guard
    {
        return Auth::guard('api');
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = app(User::class);
        $data = array_merge($request->all(), [
            'login_type' => LoginTypeEnum::EMAIL,
        ]);
        $user->fill($data);
        $user->save();

        $credentials = $request->only('email', 'password');
        $token = $this->guard()->attempt($credentials);

        return response()->json([
            'token' => $token,
            'user' => $user,
        ]);
    }
}

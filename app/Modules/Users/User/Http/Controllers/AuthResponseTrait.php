<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-20
 * Time: 14:34
 */

namespace App\Modules\Users\User\Http\Controllers;

trait AuthResponseTrait
{
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
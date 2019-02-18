<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 10.11.2017
 */

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Http\Requests\ChangePasswordRequest;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new AuthController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param ChangePasswordRequest $request
     *
     * @return mixed
     */
    public function change(ChangePasswordRequest $request)
    {
        /** @var Authenticatable $user */
        $user = Auth::user();

        if (!Hash::check($request->get('old_password'), $user->password)) {
            return response()->json(['message' => 'Wrong old password. Please try again'], 400);
        }

        $user->password = $request->get('new_password');
        $user->save();

        return response()->json(['message' => 'Password changed successfully']);
    }
}

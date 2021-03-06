<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 10.11.2017
 */

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Http\Requests\ChangePasswordRequest;
use App\Services\ResponseBuilder\ApiCode;
use App\Services\ResponseBuilder\CustomResponseBuilder;
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
            return CustomResponseBuilder::error(ApiCode::WRONG_OLD_PASSWORD);
        }

        $user->password = $request->get('new_password');
        $user->save();

        return CustomResponseBuilder::success();
    }
}

<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 20.04.19
 *
 */

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Models\User;
use App\Services\ResponseBuilder\CustomResponseBuilder;

class UserController extends Controller
{
    public function show(User $user)
    {
        return CustomResponseBuilder::success(
            $user->hideForPublic()
        );
    }
}
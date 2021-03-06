<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 21.11.2017
 */

namespace App\Helpers;

use App\Modules\Challenges\Http\Controllers\Admin\ChallengeController;
use App\Modules\Companies\Http\Controllers\Admin\CompanyController;
use App\Modules\Content\Http\Controllers\Admin\ContentController;
use App\Modules\Users\Admin\Http\Controllers\DashboardController;
use App\Modules\Users\User\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Request;

class ActiveLink
{
    /**
     * @return bool
     */
    public static function checkDashboard(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof DashboardController;
    }

    /**
     * @return bool
     */
    public static function checkContent(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof ContentController;
    }

    /**
     * @return bool
     */
    public static function checkUser(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof UserController;
    }

    /**
     * @return bool
     */
    public static function checkCompany(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof CompanyController;
    }

    /**
     * @return bool
     */
    public static function checkChallenge(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof ChallengeController;
    }

    /**
     * @return mixed
     */
    protected static function getControllerInstance()
    {
        return Request::route()->getController();
    }
}

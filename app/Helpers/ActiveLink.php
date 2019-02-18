<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 21.11.2017
 */

namespace App\Helpers;

use App\Modules\Content\Http\Controllers\Admin\ContentController;
use App\Modules\Users\Admin\Http\Controllers\DashboardController;
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
     * @return mixed
     */
    protected static function getControllerInstance()
    {
        return Request::route()->getController();
    }
}

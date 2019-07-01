<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.07.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Factories;

use App\Modules\Users\Services\UserEnvironmentService\Enums\UserEnvironmentEnum;
use App\Modules\Users\Services\UserEnvironmentService\Implementations\UserCompanyEnvironmentService;
use App\Modules\Users\Services\UserEnvironmentService\Implementations\UserCountryEnvironmentService;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\EnvironmentAble;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\UserEnvironmentServiceInterface;

class UserEnvironmentServiceFactory
{
    /**
     * @param EnvironmentAble $user
     * @return UserEnvironmentServiceInterface
     */
    public static function getInstance(EnvironmentAble $user): UserEnvironmentServiceInterface
    {
        switch ($user->getCurrentEnvironment()) {
            case UserEnvironmentEnum::COUNTRY :
                return new UserCountryEnvironmentService($user);
            default :
                return new UserCompanyEnvironmentService($user);
        }
    }
}

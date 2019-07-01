<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.07.19
 *
 */

namespace App\Modules\Users\Services\UserEnvironmentService\Interfaces;

interface EnvironmentAble
{
    public function getCurrentEnvironment(): string;
}

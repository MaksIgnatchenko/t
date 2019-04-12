<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.04.19
 *
 */

namespace App\Modules\Challenges\Helpers;


use App\Modules\Challenges\Enums\ChallengeStatusEnum;

class ChallengeStatusClassHelper
{
    /**
     * @param $status
     * @return string
     */
    public static function getClassName($status) : string
    {
        switch ($status) {
            case ChallengeStatusEnum::ACTIVE :
                return 'text-success';
            case ChallengeStatusEnum::END :
                return 'text-danger';
            default :
                return 'text-dark';
        }
    }
}
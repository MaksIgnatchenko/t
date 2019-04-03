<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.04.19
 *
 */

namespace App\Modules\Challenges\Helpers;

use App\Modules\Challenges\Enums\ProofStatusEnum;

class ProofStatusClassHelper
{
    /**
     * @param $status
     * @return string
     */
    public static function getClassName($status) : string
    {
        switch ($status) {
            case ProofStatusEnum::ACCEPTED :
                return 'text-success';
            case ProofStatusEnum::REJECTED :
                return 'text-danger';
            default :
                return 'text-dark';
        }
    }
}
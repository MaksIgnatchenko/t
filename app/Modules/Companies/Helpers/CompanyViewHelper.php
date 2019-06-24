<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.06.19
 *
 */

namespace App\Modules\Companies\Helpers;

use App\Modules\Companies\Enums\CompanyTypeEnum;

class CompanyViewHelper
{
    public static function getTypeContainerClass(string $type)
    {
        switch ($type) {
            case CompanyTypeEnum::COMMERCIAL :
                return 'badge-primary';
            case CompanyTypeEnum::ARCHIEVE :
                return 'badge-warning';
            default :
                return 'badge-dark';
        }
    }
}
<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.06.19
 *
 */

namespace App\Modules\Companies\Helpers;

use App\Modules\Companies\Enums\CompanyTypeEnum;
use Illuminate\Support\Str;

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

    /**
     * @param string $name
     * @return string
     */
    public static function getPrettyShortName(string $name): string
    {
        return Str::limit($name, 20, ' ...');
    }

    /**
     * @param string $name
     * @return string
     */
    public static function getPrettyShortInfo(string $name): string
    {
        return Str::limit($name, 40, ' ...');
    }
}
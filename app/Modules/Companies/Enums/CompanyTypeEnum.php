<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.06.19
 *
 */

namespace App\Modules\Companies\Enums;

class CompanyTypeEnum
{
    public const COMMERCIAL = 'commercial';
    public const ARCHIEVE = 'archive';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::COMMERCIAL,
            self::ARCHIEVE,
        ];
    }
}
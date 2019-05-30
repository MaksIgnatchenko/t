<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Enums;

class CountryEnum
{
    public const SAUDI_ARABIA = 'Saudi Arabia';
    public const UNITED_ARAB_EMIRATES = 'United Arab Emirates';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::SAUDI_ARABIA,
            self::UNITED_ARAB_EMIRATES,
        ];
    }
}
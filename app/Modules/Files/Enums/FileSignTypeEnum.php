<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.03.19
 *
 */

namespace App\Modules\Files\Enums;

class FileSignTypeEnum
{
    public const CHALLENGE_LOGO = 'challenge_logo';
    public const COMPANY_LOGO = 'company_logo';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::CHALLENGE_LOGO,
            self::COMPANY_LOGO,
        ];
    }
}
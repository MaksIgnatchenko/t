<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.03.19
 *
 */

namespace App\Modules\Challenges\Enums;

class VideoLengthEnum
{
    public const SHORT = 15;
    public const LONG = 30;

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::SHORT,
            self::LONG
        ];
    }
}
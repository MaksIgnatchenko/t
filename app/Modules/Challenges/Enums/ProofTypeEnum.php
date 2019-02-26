<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Enums;

class ProofTypeEnum
{
    public const PHOTO = 'photo';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::PHOTO
        ];
    }
}
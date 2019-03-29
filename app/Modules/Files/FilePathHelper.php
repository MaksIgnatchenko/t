<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Files;

use App\Modules\Files\Enums\FileSignTypeEnum;

class FilePathHelper
{
    /**
     * @param string $fileSign
     * @return string
     */
    public static function getPath(string $fileSign) : string
    {
        switch ($fileSign) {
            case FileSignTypeEnum::COMPANY_LOGO :
                $path = config('custom.company_logo_path');
                break;
            case FileSignTypeEnum::CHALLENGE_LOGO :
                $path = config('custom.challenge_logo_path');
                break;
            default :
                $path = null;
        }
        return self::buildPath($path);
    }

    /**
     * @param string $path
     * @return string
     */
    private static function buildPath(string $path) : string
    {
        return $path ? $path . '/' : '';
    }
}
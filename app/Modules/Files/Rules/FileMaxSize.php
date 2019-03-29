<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.03.19
 *
 */

namespace App\Modules\Files\Rules;

use App\Modules\Files\Enums\FileSignTypeEnum;
use Illuminate\Http\Request;

class FileMaxSize
{
    /**
     * @param Request $request
     * @return int
     */
    public static function getMaxSize(Request $request) : int
    {
        $fileSign = $request->sign ?? null;
        switch ($fileSign) {
            case FileSignTypeEnum::CHALLENGE_LOGO :
                return config('custom.challenge_logo_max_size');
            case FileSignTypeEnum::COMPANY_LOGO :
                return config('custom.company_logo_max_size');
            default :
                return config('custom.default_file_max_size');
        }
    }
}
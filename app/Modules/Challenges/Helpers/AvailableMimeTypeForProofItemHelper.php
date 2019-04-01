<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Helpers;

use App\Modules\Challenges\Enums\ProofTypeEnum;

class AvailableMimeTypeForProofItemHelper
{
    /**
     * @param string $proofType
     * @return array
     */
    public static function get(string $proofType) : array
    {
        switch ($proofType) {
            case ProofTypeEnum::PHOTO :
                return self::getImageMimes();
            case ProofTypeEnum::MULTIPLE_PHOTOS :
                return self::getImageMimes();
            case ProofTypeEnum::VIDEO :
                return self::getVideoMimes();
            case ProofTypeEnum::MULTIPLE_VIDEOS :
                return self::getVideoMimes();
            case ProofTypeEnum::SCREENSHOT :
                return self::getImageMimes();
            case ProofTypeEnum::MULTIPLE_SCREENSHOTS :
                return self::getImageMimes();
        }
    }

    /**
     * @return array
     */
    private static function getImageMimes() : array
    {
        return [
            'jpg',
            'jpeg',
            'png',
        ];
    }

    /**
     * @return array
     */
    private static function getVideoMimes() : array
    {
        return [
            'mp4',
        ];
    }
}
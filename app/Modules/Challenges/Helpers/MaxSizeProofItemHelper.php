<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Helpers;

use App\Modules\Challenges\Enums\ProofTypeEnum;

class MaxSizeProofItemHelper
{
    /**
     * @param string $proofType
     * @return int
     */
    public static function get(string $proofType) : int
    {
        switch ($proofType) {
            case ProofTypeEnum::PHOTO :
                return self::getImageMaxSize();
            case ProofTypeEnum::MULTIPLE_PHOTOS :
                return self::getImageMaxSize();
            case ProofTypeEnum::VIDEO :
                return self::getVideoMaxSize();
            case ProofTypeEnum::MULTIPLE_VIDEOS :
                return self::getVideoMaxSize();
            case ProofTypeEnum::SCREENSHOT :
                return self::getImageMaxSize();
            case ProofTypeEnum::MULTIPLE_SCREENSHOTS :
                return self::getImageMaxSize();
        }
    }

    /**
     * @return int
     */
    private static function getImageMaxSize() : int
    {
        return config('custom.max_size_proof_image', 1024 * 1024 * 5);
    }

    /**
     * @return int
     */
    private static function getVideoMaxSize() : int
    {
        return config('custom.max_size_proof_video', 1024 * 1024 * 10);
    }
}
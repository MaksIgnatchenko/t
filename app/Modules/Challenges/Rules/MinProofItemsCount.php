<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.03.19
 *
 */

namespace App\Modules\Challenges\Rules;

use App\Modules\Challenges\Enums\ProofTypeEnum;
use Illuminate\Http\Request;

class MinProofItemsCount
{
    /**
     * @param Request $request
     * @return int
     */
    public static function get(Request $request) : int
    {
        $proofType = $request->proof_type;
        if (in_array($proofType, ProofTypeEnum::getMultipleTypes())) {
            return 2;
        }
        return 1;
    }
}
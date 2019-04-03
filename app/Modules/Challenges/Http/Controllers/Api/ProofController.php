<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Http\Requests\SendProofRequest;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use App\Services\ResponseBuilder\ApiCode;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProofController extends Controller
{
    /**
     * @param Challenge $challenge
     * @param Proof $proof
     * @return Response
     */
    public function show(Challenge $challenge, Proof $proof) : Response
    {
        if ($proof->challenge_id !== $challenge->id) {
            return CustomResponseBuilder::error(ApiCode::PROOF_DOES_NOT_BELONG_TO_THIS_CHALLENGE);
        }
        return CustomResponseBuilder::success($proof);
    }

    /**
     * @param SendProofRequest $request
     * @return Response
     */
    public function store(SendProofRequest $request) : Response
    {
        $challenge = $request->challenge;
        $user = Auth::user();
        if (!$challenge->checkForActiveStatus()) {
            return CustomResponseBuilder::error(ApiCode::CHALLENGE_NOT_ACTIVE);
        }
        if (!$challenge->is_participated) {
            return CustomResponseBuilder::error(ApiCode::USER_NOT_PARTICIPATING);
        }
        if ($user->isAbleToSendProof($challenge)) {
            return CustomResponseBuilder::error(ApiCode::USER_HAS_PENDING_OR_ACCEPTED_PROOF);
        }
        $proof = app()[Proof::class];
        $proof->fill($request->all());
        $proof->fillFiles($request->items);
        $proof->challenge_id = $challenge->id;
        $proof->user_id = $user->id;
        $proof->status = ProofStatusEnum::PENDING;
        $proof->save();
        return CustomResponseBuilder::success();
    }

    /**
     * @param Challenge $challenge
     * @param Proof $proof
     * @return Response
     * @throws \Exception
     */
    public function destroy(Challenge $challenge, Proof $proof) : Response
    {
        $this->authorize('destroy', $proof);
        if ($proof->challenge_id !== $challenge->id) {
            return CustomResponseBuilder::error(ApiCode::PROOF_DOES_NOT_BELONG_TO_THIS_CHALLENGE);
        }
        if (!$proof->isAbleForDeletion()) {
            return CustomResponseBuilder::error(ApiCode::PROOF_CANNOT_BE_REMOVED);
        }
        $proof->delete();
        return CustomResponseBuilder::success();
    }
}
<?php

namespace App\Modules\Challenges\Services;

use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Models\Proof;
use Illuminate\Http\RedirectResponse;

class RedirectToNextProof
{
    /**
     * @var Proof
     */
    private $currentProof;

    /**
     * RedirectToNextProof constructor.
     * @param Proof $proof
     */
    public function __construct(Proof $proof)
    {
        $this->currentProof = $proof;
    }

    /**
     * @return RedirectResponse
     */
    public function redirect() : RedirectResponse
    {
        if ($nextProof = $this->getNextProof()) {
            return redirect()->route('challenge.proof.show', [$nextProof->challenge_id, $nextProof->id]);
        }
        flash('There are no pending proofs for this challenge')->success();
        return redirect()->route('challenge.proof.index', $this->currentProof->challenge_id);
    }

    /**
     * @return Proof|null
     */
    protected function getNextProof() : ?Proof
    {
        return Proof::where('challenge_id', $this->currentProof->challenge_id)
            ->where('status', ProofStatusEnum::PENDING)
            ->where('id', '<>', $this->currentProof->id)
            ->oldest()
            ->first();
    }
}
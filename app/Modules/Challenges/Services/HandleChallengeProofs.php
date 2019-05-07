<?php

namespace App\Modules\Challenges\Services;

use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use Illuminate\Http\RedirectResponse;

class HandleChallengeProofs
{
    /**
     * @var Challenge
     */
    private $challenge;

    /**
     * HandleChallengeProofs constructor.
     * @param Challenge $challenge
     */
    public function __construct (Challenge $challenge)
    {
        $this->challenge = $challenge;
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
        return redirect()->route('challenge.proof.index', $this->challenge->id);
    }

    /**
     * @return Proof|null
     */
    protected function getNextProof() : ?Proof
    {
        return $this->challenge->proofs()->pending()->oldest()->first();
    }
}
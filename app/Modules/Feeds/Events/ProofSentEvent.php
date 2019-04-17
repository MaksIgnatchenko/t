<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Events;

use App\Modules\Challenges\Models\Proof;

class ProofSentEvent
{
    /**
     * @var array
     */
    public $proof;

    /**
     * ProofsSentEvent constructor.
     * @param Proof $proof
     */
    public function __construct(Proof $proof)
    {
        $this->proof = $proof;
    }

    /**
     * @return int
     */
    public function getProofId() : int
    {
        return $this->proof->id;
    }

    public function getCountry()
    {
        return $this->proof->challenge->country;
    }
}
<?php

namespace App\Modules\Challenges\Services;

use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use Illuminate\Support\Collection;

class ApiResultsData
{
    /**
     * @var Challenge
     */
    private $challenge;

    /**
     * @var int
     */
    private $fromPosition;

    /**
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var Proof|null
     */
    private $myAcceptedProof;

    /**
     * ApiResultsData constructor.
     * @param Challenge $challenge
     * @param int $fromPosition
     * @param int $limit
     * @param int $userId
     */
    public function __construct(Challenge $challenge, ?int $fromPosition, ?int $limit, int $userId)
    {
        $this->challenge = $challenge;
        $this->fromPosition = $fromPosition;
        $this->limit = $limit;
        $this->userId = $userId;
    }

    /**
     * @return array
     */
    public function build() : array
    {
        $results = [];
        foreach ($this->getAcceptedProofs() as $proof) {
            $results[] = $this->getResultStructure($proof);
        }
        $myResult = $this->getResultStructure($this->getMyAcceptedProof());
        return [
            'my_result' => $myResult,
            'results' => $results,
        ];
    }

    /**
     * @return Collection
     */
    private function getAcceptedProofs() : Collection
    {
        $acceptedProofs = $this
            ->challenge
            ->getAcceptedProofs($this->fromPosition, $this->limit);
        $this->myAcceptedProof = $acceptedProofs->first(function($proof) {
            return $proof->user_id == $this->userId;
        });
        return $acceptedProofs;
    }

    /**
     * @return Proof|null
     */
    private function getMyAcceptedProof() : ?Proof
    {
        return $this->myAcceptedProof ?: $this->challenge->getMyAcceptedProof();
    }

    /**
     * @param Proof|null $proof
     * @return array|null
     */
    private function getResultStructure(?Proof $proof) : ?array
    {
        if (!$proof) {
            return null;
        }
        return [
            'position' => $proof->position,
            'reward' => $proof->reward,
            'user' => $proof->user ?? null,
        ];
    }
}
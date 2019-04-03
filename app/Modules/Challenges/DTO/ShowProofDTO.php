<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.04.19
 *
 */

namespace App\Modules\Challenges\DTO;

use App\Modules\Challenges\Enums\ProofStatusEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Models\Proof;
use App\Modules\Users\User\Models\User;

class ShowProofDTO
{
    /**
     * @var Proof
     */
    private $proof;

    private $challenge;

    /**
     * ShowProofDTO constructor.
     * @param Challenge $challenge
     * @param Proof $proof
     */
    public function __construct(Challenge $challenge, Proof $proof)
    {
        $this->challenge = $challenge;
        $this->proof = $proof;
    }

    /**
     * @return string
     */
    public function getChallengeName() : string
    {
        return $this->challenge->name;
    }

    public function getChallengeLink() : string
    {
        return route('challenge.show', $this->challenge->id);
    }

    /**
     * @return int
     */
    public function getChallengeId() : int
    {
        return $this->challenge->id;
    }

    /**
     * @return string
     */
    public function getProofType() : string
    {
        return $this->proof->type;
    }

    /**
     * @return string
     */
    public function getProofStatus() : string
    {
        return $this->proof->status;
    }

    /**
     * @return int
     */
    public function getProofId() : int
    {
        return $this->proof->id;
    }

    /**
     * @return string
     */
    public function getSendTime() : string
    {
        return $this->proof->created_at;
    }

    /**
     * @return User
     */
    public function getUserName() : string
    {
        return $this->proof->user->full_name;
    }

    /**
     * @return User
     */
    public function getUserLink() : string
    {
        return route('users.show', $this->proof->user->id);
    }

    /**
     * @return array
     */
    public function getItems() : array
    {
        return $this->proof->items;
    }

    /**
     * @param $item
     * @return string
     */
    public function buildItemTag($item) : string
    {
        if (ProofTypeEnum::MULTIPLE_VIDEOS === $this->proof->type
            || ProofTypeEnum::VIDEO === $this->proof->type) {
            return $this->buildVideoTag($item);
        }
        return $this->buildImageTag($item);
    }

    /**
     * @param $item
     * @return string
     */
    private function buildImageTag($item) : string
    {
        return "<img class='show-image' src=" . $item . " />";
    }

    /**
     * @param $item
     * @return string
     */
    private function buildVideoTag($item) : string
    {
        return '<video width="100%" controls><source src="' . $item . '" type="video/mp4"></video>';
    }

    /**
     * @return bool
     */
    public function isAbleForChangeStatus() : bool
    {
        return $this->proof->isAbleForChangeStatus();
    }
}
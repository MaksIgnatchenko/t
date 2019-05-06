<?php

namespace App\Modules\Challenges\Services;

use App\Modules\Challenges\Models\Proof;
use App\Modules\Users\User\Models\User;

class RewardService
{
    /**
     * @var
     */
    private $proof;

    /**
     * @var
     */
    private $user;

    /**
     * @var
     */
    private $reward;

    public function __construct(Proof $proof, User $user)
    {
        $this->proof = $proof;
        $this->user = $user;
    }

    public function handle() : void
    {
        $this->chargeReward();
        $this->attachRewardToResults();
    }

    private function chargeReward() : void
    {
        $this->user->chargeReward($this->calculateReward());
        $this->user->save();
    }

    private function attachRewardToResults() : void
    {
        $this->proof->attachReward($this->calculateReward());
    }

    /**
     * @return int
     */
    private function calculateReward() : int
    {
        if ($this->reward) {
            return $this->reward;
        }

        switch ($this->proof->position) {
            case 1 :
                $reward = 100;
                break;
            case 2 :
                $reward = 90;
                break;
            case 3 :
                $reward = 80;
                break;
            case 4 :
                $reward = 70;
                break;
            case 5 :
                $reward = 60;
                break;
            case 6 :
                $reward = 50;
                break;
            case 7 :
                $reward = 40;
                break;
            case 8 :
                $reward = 30;
                break;
            case 9 :
                $reward = 20;
                break;
            default :
                $reward = 10;
        }
        $this->reward = $reward;
        return $this->reward;
    }
}
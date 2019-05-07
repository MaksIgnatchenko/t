<?php

namespace App\Modules\Users\Services\ReferralCodeService;

use App\Modules\Users\User\Models\User;

class ReferralCodeService
{
    /**
     * @var User
     */
    private $currentUser;

    /**
     * ReferralCodeService constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->currentUser = $user;
    }

    public function handle() : void
    {
        $this->currentUser->chargeRewardToReferralUser();
        $this->currentUser->calculateReferralCode();
    }
}
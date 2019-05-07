<?php

namespace App\Modules\Users\Services\ReferralCodeService;

interface ReferralAble
{
    public function chargeRewardToReferralUser() : void;

    public function calculateReferralCode() : void;
}
<?php

namespace App\Modules\Users\Observers;

use App\Modules\Users\Services\ReferralCodeService\ReferralCodeService;
use App\Modules\Users\User\Models\User;

class UserObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param User $user
     */
    public function creating(User $user)
    {
        $referralCodeService = new ReferralCodeService($user);
        $referralCodeService->handle();
    }
}
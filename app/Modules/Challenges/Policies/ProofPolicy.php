<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.04.19
 *
 */

namespace App\Modules\Challenges\Policies;

use App\Modules\Challenges\Models\Proof;
use App\Modules\Users\User\Models\User;

class ProofPolicy
{
    /**
     * Determine if the given proof can be deleted by the user.
     *
     * @param User $user
     * @param Proof $proof
     * @return bool
     */
    public function destroy(User $user, Proof $proof)
    {
        return $user->id === $proof->user_id;
    }
}

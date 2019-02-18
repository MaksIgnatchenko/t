<?php
/**
 * Created by Ilya Kobus, Appus Studio LP on 1.10.2018
 */

namespace App\Modules\Users\Customer\Services\Social;

use App\Modules\Users\User\Models\User;

interface SocialServiceInterface
{
    /**
     * @return array
     */
    public function getUserData(): array;

    /**
     * @param array $userData
     * @return User|null
     */
    public function findOrCreateUser(array $userData): ?User;
}

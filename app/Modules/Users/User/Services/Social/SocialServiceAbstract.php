<?php
/**
 * Created by Ilya Kobus, Appus Studio LP on 1.10.2018
 */

namespace App\Modules\Users\Customer\Services\Social;

use Illuminate\Support\Facades\Hash;

abstract class SocialServiceAbstract
{
    public const TYPE = '';

    /** @var string $token */
    protected $token;
    /** @var array $credentials */
    protected $credentials;

    /**
     * SocialServiceAbstract constructor.
     *
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @param $userData
     * @return array
     */
    protected function fillUserData($userData): array
    {
        return [
            'email' => $userData['email'] ?? null,
            'first_name' => $userData['first_name'],
            'last_name' => $userData['first_name'],
            'password' => Hash::make(str_random(64)),
            'login_type' => static::TYPE,
        ];
    }
}

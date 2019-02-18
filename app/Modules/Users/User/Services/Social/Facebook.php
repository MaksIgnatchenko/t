<?php
/**
 * Created by Ilya Kobus, Appus Studio LP on 1.10.2018
 */

namespace App\Modules\Users\Customer\Services\Social;

use App\Modules\Users\User\Models\User;
use Facebook\FacebookApp;
use Facebook\FacebookClient;
use Facebook\FacebookRequest;

class Facebook extends SocialServiceAbstract implements SocialServiceInterface
{
    public const TYPE = 'facebook';

    protected $fbApp;

    /**
     * SocialServiceFacebook constructor.
     *
     * @param $token
     *
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function __construct($token)
    {
        parent::__construct($token);

        $this->credentials = [
            'appId' => config('services.facebook.client_id'),
            'appSecret' => config('services.facebook.client_secret'),
        ];

        $this->fbApp = new FacebookApp($this->credentials['appId'], $this->credentials['appSecret']);
    }

    /**
     * @return array
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public function getUserData(): array
    {
        $fbRequest = new FacebookRequest($this->fbApp, $this->token, 'GET', '/me?fields=id,first_name,last_name,email');

        $client = new FacebookClient();
        $response = $client->sendRequest($fbRequest);

        return $response->getDecodedBody();
    }

    /**
     * @param array $userData
     * @return User|null
     */
    public function findOrCreateUser(array $userData): User
    {
        $user = User::where('email', $userData['email'] ?? null)
            ->where('facebook_id', $userData['id'])
            ->first();

        if (!$user) {
            $user = User::create($this->fillUserData($userData));
        }

        return $user;
    }

    /**
     * @param $userData
     * @return array
     */
    protected function fillUserData($userData): array
    {
        $data = parent::fillUserData($userData);
        return array_merge($data, [
            'facebook_id' => $userData['id'],
        ]);
    }
}

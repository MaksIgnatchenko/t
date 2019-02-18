<?php
/**
 * Created by Ilya Kobus, Appus Studio LP on 1.10.2018
 */

namespace App\Modules\Users\Customer\Services\Social;

use App\Modules\Users\User\Models\User;
use App\Modules\Users\User\Services\SocialServiceException;

class Google extends SocialServiceAbstract implements SocialServiceInterface
{
    public const TYPE = 'google';

    /** @var $device string */
    protected $device;
    /** @var \Google_Client */
    protected $client;

    /**
     * Google constructor.
     * @param $token
     * @param $device
     */
    public function __construct($token, $device)
    {
        parent::__construct($token);

        $this->device = $device;

        $clientID = DeviceEnum::ANDROID === $this->device ? config('services.google.client_id') : config('services.google.client_id_ios');

        $this->client = new \Google_Client(['client_id' => $clientID]);
    }

    /**
     * @return array
     * @throws SocialServiceException
     */
    public function getUserData(): array
    {
        $payload = $this->client->verifyIdToken($this->token);

        if (!$payload) {
            throw new SocialServiceException('Token ID verification failed');
        }

        return $this->replaceKeys($payload, [
            'given_name' => 'first_name',
            'family_name' => 'last_name',
        ]);
    }

    /**
     * @param $dataArray
     * @param $keysArray
     * @return mixed
     */
    private function replaceKeys($dataArray, $keysArray): array
    {
        foreach ($keysArray as $oldkey => $newKey) {
            if (array_key_exists($oldkey, $dataArray)) {
                $dataArray[$newKey] = $dataArray[$oldkey];
                unset($dataArray[$oldkey]);
            }
        }

        return $dataArray;
    }

    /**
     * @param array $userData
     * @return User|null
     */
    public function findOrCreateUser(array $userData): User
    {
        $user = User::where('email', $userData['email'])->first();

        if (!$user) {
            $user = User::create($this->fillUserData($userData));
        }

        return $user;
    }
}

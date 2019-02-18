<?php
/**
 * Created by Ilya Kobus, Appus Studio LP on 1.10.2018
 */

namespace App\Modules\Users\User\Services;

use App\Modules\Users\Customer\Services\Social\Facebook;
use App\Modules\Users\Customer\Services\Social\Google;
use App\Modules\Users\Customer\Services\Social\SocialServiceInterface;

class SocialServiceFactory
{
    /**
     * @param string $service
     * @param string $token
     * @param string $device
     * @return SocialServiceInterface
     * @throws SocialServiceException
     * @throws \Facebook\Exceptions\FacebookSDKException
     */
    public static function get(string $service, string $token, string $device): SocialServiceInterface
    {
        switch ($service) {
            case Facebook::TYPE:
                return new Facebook($token);
            case  Google::TYPE:
                return new Google($token, $device);
            default:
                throw new SocialServiceException("Illegal service name: {$service}");
        }
    }
}

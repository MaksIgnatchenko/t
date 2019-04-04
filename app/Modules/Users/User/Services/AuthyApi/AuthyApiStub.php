<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 04.04.19
 *
 */

namespace App\Modules\Users\User\Services\AuthyApi;

class AuthyApiStub implements AuthyApiInterface
{
    /**
     * @var string
     */
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $phoneNumber
     * @param string $countryCode
     * @return object
     */
    public function phoneVerificationStart(string $phoneNumber, string $countryCode) : object
    {
        return new class {
            public function ok() : bool
            {
                return true;
            }
        };
    }

    /**
     * @param string $phoneNumber
     * @param string $countryCode
     * @param $code
     * @return object
     */
    public function phoneVerificationCheck(string $phoneNumber, string $countryCode, $code) : object
    {
        return new class {
            public function ok() : bool
            {
                return true;
            }
        };
    }

}
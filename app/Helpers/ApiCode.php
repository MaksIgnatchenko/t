<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 22.02.19
 *
 */

namespace App\Helpers;

class ApiCode
{
    public const NO_SUCH_USER = 1; // No such user or phone number
    public const TWILIO_WRONG_VERIFICATION_CODE = 2; // No pending verifications for {number} found.
    public const TWILIO_SEND_SMS_ERROR = 3; // Cannot send SMS to landline phone numbers
    public const WRONG_OLD_PASSWORD = 4; // Wrong old password. Please try again
    public const NO_SUCH_EMAIL = 5; // No such email
}
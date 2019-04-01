<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 22.02.19
 *
 */

namespace App\Services\ResponseBuilder;

class ApiCode
{
    public const NO_SUCH_USER = 1; // No such user or phone number
    public const TWILIO_WRONG_VERIFICATION_CODE = 2; // No pending verifications for {number} found.
    public const TWILIO_SEND_SMS_ERROR = 3; // Cannot send SMS to landline phone numbers
    public const WRONG_OLD_PASSWORD = 4; // Wrong old password. Please try again
    public const NO_SUCH_EMAIL = 5; // No such email
    public const METHOD_NOT_ALLOWED = 12;
    public const VALIDATION_ERRORS = 15;
    public const NO_SUCH_ITEM = 16;
    public const UNAUTHENTICATED = 17;
    public const PARTICIPANTS_LIMIT_EXCEEDED = 18;
    public const NOT_ENOUGH_COINS = 19;
    public const USER_IS_ALREADY_PARTICIPATING = 20;
    public const USER_NOT_PARTICIPATING = 21;
    public const USER_HAS_PENDING_PROOF = 22;
    public const CHALLENGE_NOT_ACTIVE = 23;
    public const USER_HAS_PENDING_OR_ACCEPTED_PROOF = 24;
    public const USER_IS_NOT_OWNER_OF_PROOF = 25;
    public const PROOF_DOES_NOT_BELONG_TO_THIS_CHALLENGE = 26;
    public const PROOF_CANNOT_BE_REMOVED = 27;

}
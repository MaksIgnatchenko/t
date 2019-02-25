<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Rules;

use App\Services\ResponseBuilder\ValidationErrorCode;

class PasswordRuleApi extends PasswordRule
{
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ValidationErrorCode::PASSWORD_RULE;
    }
}
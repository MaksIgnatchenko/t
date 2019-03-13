<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Services\ResponseBuilder;

class ValidationErrorCode
{
    public const REQUIRED = 1000;
    public const MIN = 1001;
    public const MAX = 1002;
    public const STRING = 1003;
    public const UNIQUE = 1004;
    public const CONFIRMED = 1005;
    public const PASSWORD_RULE = 1006; // Your password must contain at least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.
    public const FILE = 1007; // Field must an file
    public const IMAGE = 1008; // Field must an file
    public const MIMES = 1009; // Unsupported format
    public const DATE = 1010; // Unsupported date format
    public const EMAIL = 1011;
    public const EXISTS = 1012;
    public const INTEGER = 1013;
}



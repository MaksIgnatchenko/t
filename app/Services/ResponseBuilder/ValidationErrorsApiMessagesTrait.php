<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Services\ResponseBuilder;

trait ValidationErrorsApiMessagesTrait
{
    public function messages()
    {
        return [
            'required' => ValidationErrorCode::REQUIRED,
            'string' => ValidationErrorCode::STRING,
            'min' => ValidationErrorCode::MIN,
            'max' => ValidationErrorCode::MAX,
            'unique' => ValidationErrorCode::UNIQUE,
            'confirmed' => ValidationErrorCode::CONFIRMED,
            'password_rule' => ValidationErrorCode::PASSWORD_RULE,
            'file' => ValidationErrorCode::FILE,
            'image' => ValidationErrorCode::IMAGE,
            'mimes' => ValidationErrorCode::MIMES,
            'date' => ValidationErrorCode::DATE,
            'date_format'=> ValidationErrorCode::DATE,
            'email' => ValidationErrorCode::EMAIL,
            'exists' => ValidationErrorCode::EXISTS,
        ];
    }
}
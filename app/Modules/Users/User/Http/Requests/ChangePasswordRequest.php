<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-14
 * Time: 18:25
 */

namespace App\Modules\Users\User\Http\Requests;

use App\Rules\PasswordRule;
use App\Rules\PasswordRuleApi;
use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    use ValidationErrorsApiMessagesTrait;

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => [
                'required',
                'min:6',
                'max:50',
                new PasswordRuleApi(),
            ],
            'new_password' => [
                'required',
                'confirmed',
                'min:6',
                'max:50',
                new PasswordRuleApi(),
            ],
        ];
    }

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
}
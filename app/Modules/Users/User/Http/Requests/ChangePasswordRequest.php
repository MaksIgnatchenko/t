<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-14
 * Time: 18:25
 */

namespace App\Modules\Users\User\Http\Requests;

use App\Rules\PasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
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
                new PasswordRule(),
            ],
            'new_password' => [
                'required',
                'confirmed',
                'min:6',
                'max:50',
                new PasswordRule(),
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
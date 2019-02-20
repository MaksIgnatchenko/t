<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 14:30
 */

namespace App\Modules\Users\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartVerificationRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'country_code' => 'required|string|max:3',
            'phone_number' => [
                'required',
                'string',
                'max:10',
                'unique:users,phone_number',
            ],
        ];
    }
}

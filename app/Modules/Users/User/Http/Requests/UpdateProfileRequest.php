<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 14:49
 */

namespace App\Modules\Users\User\Http\Requests;

use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    use ValidationErrorsApiMessagesTrait;

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
            'avatar' => 'file|image|mimes:jpeg,png,jpg|max:' . 1024 * 1024 * 5,
            'full_name' => 'required|string|max:100',
            'birthday' => 'required|date_format:U',
            'sex' => 'required|string|max:50',
            'country' => 'required|string|max:50',
            'city' => 'string|max:50',
            'company' => 'string|max:50',
            'email' => "required|email|max:50|unique:users,email,{$this->user()->id}",
        ];
    }
}
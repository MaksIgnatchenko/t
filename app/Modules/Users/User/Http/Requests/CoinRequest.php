<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 14:30
 */

namespace App\Modules\Users\User\Http\Requests;

use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;
use Illuminate\Foundation\Http\FormRequest;

class CoinRequest extends FormRequest
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
            'amount' => 'required|integer|min:0|max:1000',
        ];
    }
}
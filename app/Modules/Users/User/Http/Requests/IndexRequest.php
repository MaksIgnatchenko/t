<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-03-01
 * Time: 15:27
 */

namespace App\Modules\Users\User\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'search' => 'string|max:50',
            'limit' => 'integer|max:20',
        ];
    }
}

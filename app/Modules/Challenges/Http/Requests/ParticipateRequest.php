<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-03-01
 * Time: 17:44
 */

namespace App\Modules\Challenges\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'participate' => 'boolean',
        ];
    }
}
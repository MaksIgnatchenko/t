<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.04.19
 *
 */

namespace App\Modules\Feeds\Http\Requests;

use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;
use Illuminate\Foundation\Http\FormRequest;

class IndexFeedRequest extends FormRequest
{
    use ValidationErrorsApiMessagesTrait;

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
            'id' => 'int|min:1',
            'limit' => 'int|min:1',
        ];
    }

    /**
     * @return string
     */
    public function getUsersCountry() : string
    {
        return $this->user()->getCountry();
    }
}
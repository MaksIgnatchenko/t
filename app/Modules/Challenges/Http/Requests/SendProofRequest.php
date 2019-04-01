<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 29.03.19
 *
 */

namespace App\Modules\Challenges\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\ResponseBuilder\ValidationErrorsApiMessagesTrait;

class SendProofRequest extends FormRequest
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
        $challenge = $this->route('challenge');
        return [
            'type' => ['required', 'equal:' . $challenge->getRequiredProofsType()],
            'items' => ['required', 'array', 'items_count:' . $challenge->getRequiredProofsCount()],
            'items.*' => ['file', 'mimes:' . implode(',', $challenge->getAvailableProofItemsMimeType()), 'max:' . $challenge->getMaxSizeProofItemsMimeType()],
        ];
    }
}
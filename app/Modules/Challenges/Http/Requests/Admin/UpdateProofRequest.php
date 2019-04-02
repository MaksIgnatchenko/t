<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.04.19
 *
 */

namespace App\Modules\Challenges\Http\Requests\Admin;

use App\Modules\Challenges\Enums\ProofStatusEnum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProofRequest extends FormRequest
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
            'status'  => ['required', 'string', 'min:1', 'max:100', Rule::in(ProofStatusEnum::getAll())],
        ];
    }
}
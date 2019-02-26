<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Http\Requests\Admin;

use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChallengeRequest extends FormRequest
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
            'company_id' => 'nullable|exists:companies,id',
            'name' => 'required|string|max:50',
            'logo' => 'file|image|mimes:jpeg,png,jpg|max:' . config('custom.company_logo_max_size'),
            'description' => 'required|string|max:1000',
            'link' => 'required|url|max:255',
            'country' => ['required', 'string', 'max:100', Rule::in(CountryEnum::getAll())],
            'city' => 'string|max:100',
            'participants_limit' => 'int|max:10000',
            'proof_type' => ['required', 'string', 'max:100', Rule::in(ProofTypeEnum::getAll())],
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date',
        ];
    }
}
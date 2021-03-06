<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Http\Requests\Admin;

use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Enums\VideoLengthEnum;
use App\Modules\Challenges\Rules\MinProofItemsCount;
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
            'image' => 'required',
            'description' => 'required|string|max:1000',
            'link' => 'required|url|max:255',
            'country' => ['required', 'string', 'max:100', Rule::in(CountryEnum::getAll())],
            'city' => 'nullable|string|max:100',
            'participants_limit' => 'int|max:10000',
            'proof_type' => ['required', 'string', 'max:100', Rule::in(ProofTypeEnum::getAll())],
            'items_count_in_proof' => 'required|integer|min:' . MinProofItemsCount::get($this) . '|max:' . config('custom.max_items_in_proof'),
            'video_duration' => ['nullable', 'integer', Rule::in(VideoLengthEnum::getAll())],
            'start_date' => 'required|date|after:yesterday',
            'end_date' => 'required|date|after:start_date',
        ];
    }
}
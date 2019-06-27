<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 18.04.19
 *
 */

namespace App\Modules\Challenges\Http\Requests\Admin;

use App\Modules\Challenges\Enums\CountryEnum;
use App\Modules\Challenges\Enums\ProofTypeEnum;
use App\Modules\Challenges\Enums\VideoLengthEnum;
use App\Modules\Challenges\Rules\ChallengeStartDateTimeRule;
use App\Modules\Challenges\Rules\IsAbleToChangeEndDateRule;
use App\Modules\Challenges\Rules\IsAbleToChangeStartDateRule;
use App\Modules\Challenges\Rules\MinProofItemsCount;
use App\Modules\Challenges\Rules\UpdateProofsCountRule;
use App\Modules\Challenges\Rules\UpdateProofTypeRule;
use App\Modules\Challenges\Rules\UpdateStartDateRule;
use App\Modules\Challenges\Rules\UpdateVideoDurationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChallengeRequest extends FormRequest
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
            'name' => "required|string|min:5|max:50|unique:challenges,name,{$this->challenge->id}",
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'link' => 'required|url|max:255',
            'country' => [
                'nullable',
                'string',
                'max:100',
                Rule::in(CountryEnum::getAll())
            ],
            'city' => 'nullable|string|max:100',
            'participants_limit' => 'int|max:10000',
            'proof_type' => [
                'required',
                'string',
                'max:100',
                Rule::in(ProofTypeEnum::getAll()),
                new UpdateProofTypeRule($this->challenge)
            ],
            'items_count_in_proof' => [
                'required',
                'integer',
                'min:' . MinProofItemsCount::get($this),
                'max:' . config('custom.max_items_in_proof'),
                new UpdateProofsCountRule($this->challenge)
            ],
            'video_duration' => [
                'nullable',
                'integer',
                Rule::in(VideoLengthEnum::getAll()),
                new UpdateVideoDurationRule($this->challenge)
            ],
            'start_date' => [
                'required',
                'date_format:Y-m-d H:i',
                new IsAbleToChangeStartDateRule($this->challenge),
                new UpdateStartDateRule($this->challenge)
            ],
            'end_date' => [
                'required',
                'date_format:Y-m-d H:i',
                'after:start_date',
                new IsAbleToChangeEndDateRule($this->challenge)
            ],
        ];
    }
}
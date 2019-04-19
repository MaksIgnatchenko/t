<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Rules;

use App\Modules\Challenges\Interfaces\AbleToContainProofs;
use App\Modules\Challenges\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class IsAbleToChangeEndDateRule implements Rule
{
    /**
     * @var AbleToContainProofs
     */
    private $challenge;

    public function __construct(AbleToContainProofs $challenge)
    {
        $this->challenge = $challenge;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $newEndDate = Carbon::parse($value);
        $diff = $newEndDate->diffInHours($this->challenge->end_date) == 0;
        return !$this->challenge->isEnded() || $diff;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'It is impossible to change end date for ended challenge';
    }
}
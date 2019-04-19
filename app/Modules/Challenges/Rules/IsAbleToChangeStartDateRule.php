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

class IsAbleToChangeStartDateRule implements Rule
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
        $newStartDate = Carbon::parse($value);
        $diff = $newStartDate->diffInHours($this->challenge->start_date) == 0;
        return !$this->challenge->isActive() || $diff;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'It is impossible to change start date for active challenge';
    }
}
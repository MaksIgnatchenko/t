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

class UpdateStartDateRule implements Rule
{
    /**
     * @var AbleToContainProofs
     */
    private $challenge;

    /**
     * @var AbleToContainProofs
     */
    private $now;

    public function __construct(AbleToContainProofs $challenge)
    {
        $this->challenge = $challenge;
        $this->now = Carbon::now();
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
        return $newStartDate->greaterThanOrEqualTo($this->now) || $diff;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Start date and time should be greater or equal than now.';
    }
}
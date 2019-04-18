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

class ChallengeStartDateTimeRule implements Rule
{
    /**
     * @var AbleToContainProofs
     */
    private $now;

    public function __construct()
    {
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
        return Carbon::parse($value)->greaterThanOrEqualTo($this->now);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Start date and time should be greater or equal than now';
    }
}
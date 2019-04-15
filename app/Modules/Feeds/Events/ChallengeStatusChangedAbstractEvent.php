<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Events;

use App\Modules\Challenges\Models\Challenge;
use Illuminate\Queue\SerializesModels;

abstract class ChallengeStatusChangedAbstractEvent
{
    use SerializesModels;

    /**
     * @var array
     */
    public $challenge;

    /**
     * ChallengeEndedEvent constructor.
     * @param Challenge $challenge
     */
    public function __construct(Challenge $challenge)
    {
        $this->challenge = $challenge;
    }

    /**
     * @return int
     */
    public function getChallengeId() : int
    {
        return $this->challenge->id;
    }

    /**
     * @return string
     */
    public function getCountry() : string
    {
        return $this->challenge->country;
    }
}
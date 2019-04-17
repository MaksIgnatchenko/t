<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Observers;

use App\Modules\Challenges\Enums\ChallengeStatusEnum;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Feeds\Events\ChallengeEndedEventListener;
use App\Modules\Feeds\Events\ChallengeStartedEventListener;

class ChallengeObserver
{
    public function updating(Challenge $challenge) : void
    {
        if ($challenge->isDirty('status')) {

            switch ($challenge->status) {
                case ChallengeStatusEnum::ACTIVE :
                    event(new ChallengeStartedEventListener($challenge));
                    break;
                case ChallengeStatusEnum::END :
                    event(new ChallengeEndedEventListener($challenge));
                    break;
            }
        }
    }
}
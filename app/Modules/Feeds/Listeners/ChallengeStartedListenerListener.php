<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Listeners;

use App\Modules\Feeds\Enums\FeedTypeEnum;

class ChallengeStartedListenerListener extends ChallengeChangedStatusAbstractListener
{
    /**
     * @return string
     */
    public function getFeedType() : string
    {
        return FeedTypeEnum::CHALLENGE_STARTED;
    }
}
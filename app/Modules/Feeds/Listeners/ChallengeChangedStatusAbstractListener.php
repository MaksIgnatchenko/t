<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Listeners;

use App\Modules\Feeds\Events\ChallengeStatusChangedAbstractEvent;
use App\Modules\Feeds\Models\Feed;

abstract class ChallengeChangedStatusAbstractListener
{
    /**
     * @return string
     */
    public abstract function getFeedType() : string;

    /**
     * Handle the event.
     *
     * @param ChallengeStatusChangedAbstractEvent $event
     */
    public function handle(ChallengeStatusChangedAbstractEvent $event) : void
    {
        $feed = app()[Feed::class];
        $feed->type = $this->getFeedType();
        $feed->challenge_id = $event->getChallengeId();
        $feed->country = $event->getCountry();
        $feed->save();
    }
}
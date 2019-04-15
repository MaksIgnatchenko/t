<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Listeners;

use App\Modules\Feeds\Enums\FeedTypeEnum;
use App\Modules\Feeds\Events\ProofSentEvent;
use App\Modules\Feeds\Models\Feed;

class ProofSentListener
{
    /**
     * Handle the event.
     *
     * @param ProofSentEvent $event
     */
    public function handle(ProofSentEvent $event) : void
    {
        $feed = app()[Feed::class];
        $feed->type = $this->getFeedType();
        $feed->proof_id = $event->getProofId();
        $feed->country = $event->getCountry();
        $feed->save();
    }

    /**
     * @return string
     */
    public function getFeedType() : string
    {
        return FeedTypeEnum::PROOF_SENT;
    }
}
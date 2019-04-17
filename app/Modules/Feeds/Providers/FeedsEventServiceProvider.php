<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 15.04.19
 *
 */

namespace App\Modules\Feeds\Providers;

use App\Modules\Feeds\Events\ChallengeEndedEventListener;
use App\Modules\Feeds\Events\ChallengeStartedEventListener;
use App\Modules\Feeds\Events\ProofSentEvent;
use App\Modules\Feeds\Listeners\ChallengeEndedListenerListener;
use App\Modules\Feeds\Listeners\ChallengeStartedListenerListener;
use App\Modules\Feeds\Listeners\ProofSentListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class FeedsEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ChallengeStartedEventListener::class => [
            ChallengeStartedListenerListener::class,
        ],
        ChallengeEndedEventListener::class => [
            ChallengeEndedListenerListener::class,
        ],
        ProofSentEvent::class => [
            ProofSentListener::class,
        ],
    ];
}
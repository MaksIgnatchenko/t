<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.04.19
 *
 */

namespace App\Modules\Challenges\Jobs;

use App\Modules\Challenges\Enums\ChallengeStatusEnum;
use App\Modules\Challenges\Models\Challenge;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HandleChallengesStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle() : void
    {
        $challenge = app()[Challenge::class];
        $challenge->handleStatuses();
    }
}
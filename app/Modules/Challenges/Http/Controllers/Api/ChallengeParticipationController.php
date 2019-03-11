<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-03-01
 * Time: 17:07
 */

namespace App\Modules\Challenges\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Http\Requests\ParticipateRequest;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Users\User\Models\User;
use App\Services\ResponseBuilder\ApiCode;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class ChallengeParticipationController extends Controller
{
    /**
     * @param Challenge $challenge
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Challenge $challenge)
    {
        $participants = $challenge->participants()->paginate();

        return CustomResponseBuilder::success($participants);
    }

    /**
     * @param Challenge $challenge
     * @param ParticipateRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(ParticipateRequest $request, Challenge $challenge)
    {
        /** @var User $user */
        $user = Auth::user();
        $participate = (bool)$request->get('participate', false);

        if (!$participate) {
            $challenge->participants()->detach(Auth::id());
            return ResponseBuilder::success();
        }

        if (!$user->enoughCoinsToParticipateChallenge()) {
            return ResponseBuilder::error(ApiCode::NOT_ENOUGH_COINS);
        }

        if (!$challenge->enoughFreePlaces()) {
            return ResponseBuilder::error(ApiCode::PARTICIPANTS_LIMIT_EXCEEDED);
        }

        $challenge->participants()->attach(Auth::id());
        $user->coins -= Challenge::PARTICIPATION_COST;

        return ResponseBuilder::success();

    }
}
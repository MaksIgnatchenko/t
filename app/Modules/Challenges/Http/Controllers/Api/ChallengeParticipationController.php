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
            return CustomResponseBuilder::success();
        }

        if ($challenge->participants->contains($user->id)) {
            return CustomResponseBuilder::error(ApiCode::USER_IS_ALREADY_PARTICIPATING);
        }

        if (!$user->enoughCoinsToParticipateChallenge()) {
            return CustomResponseBuilder::error(ApiCode::NOT_ENOUGH_COINS);
        }

        if (!$challenge->enoughFreePlaces()) {
            return CustomResponseBuilder::error(ApiCode::PARTICIPANTS_LIMIT_EXCEEDED);
        }

        $challenge->participants()->attach(Auth::id());
        $user->coins -= Challenge::PARTICIPATION_COST;
        $user->save();

        return CustomResponseBuilder::success([
            'coins' => $user->coins
        ]);

    }
}
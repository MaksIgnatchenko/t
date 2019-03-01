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
        $participate = (bool)$request->get('participate', true);
        if ($participate) {
            $challenge->participants()->sync([Auth::id()]);
            return ResponseBuilder::success();
        }

        $challenge->participants()->detach([Auth::id()]);
        return ResponseBuilder::success();
    }
}
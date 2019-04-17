<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Users\User\Http\Requests\IndexRequest;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ChallengeController extends Controller
{
    /**
     * @param IndexRequest $request
     * @return Response
     */
    public function index(IndexRequest $request): Response
    {
        $user = Auth::user();

        $search = $request->get('search');
        $limit = (int)$request->get('limit');

        $challenges = Challenge::search($user, $search, $limit);

        return CustomResponseBuilder::success($challenges);
    }

    /**
     * @param Challenge $challenge
     * @return Response
     */
    public function show(Challenge $challenge): Response
    {
        return CustomResponseBuilder::success($challenge->load(['participants']));
    }
}

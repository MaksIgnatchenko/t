<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Models\Challenge;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class ChallengeController extends Controller
{
    /**
     * @return Response
     */
    public function index() : Response
    {
        $challenges = Challenge::paginate();
        return CustomResponseBuilder::success($challenges);
    }

    /**
     * @param Challenge $challenge
     * @return Response
     */
    public function show(Challenge $challenge) : Response
    {
        return CustomResponseBuilder::success($challenge);
    }

}
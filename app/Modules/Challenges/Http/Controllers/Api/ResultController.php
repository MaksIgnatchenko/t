<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

namespace App\Modules\Challenges\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Challenges\Models\Challenge;
use App\Modules\Challenges\Services\ApiResultsData;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class ResultController extends Controller
{
    /**
     * @param Challenge $challenge
     * @return Response
     */
    public function index(Challenge $challenge): Response
    {
        $apiResultsDataService = new ApiResultsData(
            $challenge,
            Input::get('from'),
            Input::get('limit'),
            Auth::id()
        );

        return CustomResponseBuilder::success($apiResultsDataService->build());
    }
}

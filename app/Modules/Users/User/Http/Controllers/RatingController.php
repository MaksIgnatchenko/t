<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Services\ApiRatingData\ApiRatingData;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    /**
     * @return Response
     */
    public function __invoke() : Response
    {
        $ratingDataService = new ApiRatingData(
            Auth::user(),
            Input::get('from'),
            Input::get('limit')
        );
        return CustomResponseBuilder::success($ratingDataService->buildData());
    }
}
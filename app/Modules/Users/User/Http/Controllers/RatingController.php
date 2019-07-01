<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Services\ApiRatingData\ApiRatingData;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\UserEnvironmentServiceInterface;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RatingController extends Controller
{
    /**
     * @param UserEnvironmentServiceInterface $userEnvironmentService
     * @return Response
     */
    public function __invoke(UserEnvironmentServiceInterface $userEnvironmentService) : Response
    {
        return CustomResponseBuilder::success($userEnvironmentService->getRating());
    }
}

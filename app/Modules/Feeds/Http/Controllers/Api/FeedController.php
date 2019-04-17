<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 16.04.19
 *
 */

namespace App\Modules\Feeds\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Feeds\Http\Requests\Api\IndexFeedRequest;
use App\Modules\Feeds\Models\Feed;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class FeedController extends Controller
{
    /**
     * @param IndexFeedRequest $request
     * @return Response
     */
    public function index(IndexFeedRequest $request) : Response
    {
        $feeds = Feed::local($request->getUsersCountry())->paginateById();
        return CustomResponseBuilder::success($feeds);
    }

    /**
     * @param Feed $feed
     * @return Response
     */
    public function show(Feed $feed) : Response
    {
        return CustomResponseBuilder::success($feed);
    }
}
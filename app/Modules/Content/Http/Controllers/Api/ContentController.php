<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

namespace App\Modules\Content\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Content\Models\Content;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    /**
     * @param Content $content
     * @return Response
     */
    public function get(Content $content) : Response
    {
        return CustomResponseBuilder::success($content);
    }
}

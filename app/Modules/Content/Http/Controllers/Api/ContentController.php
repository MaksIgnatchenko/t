<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

namespace App\Modules\Content\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Content\Models\Content;
use Illuminate\Http\JsonResponse;

class ContentController extends Controller
{
    /**
     * @param Content $content
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Content $content): JsonResponse
    {
        return response()->json([
            'content' => $content,
        ]);
    }
}

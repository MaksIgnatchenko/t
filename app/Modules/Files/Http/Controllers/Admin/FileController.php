<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.03.19
 *
 */

namespace App\Modules\Files\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Files\Http\Requests\Admin\UploadFileRequest;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * @param UploadFileRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function upload(UploadFileRequest $request)
    {
        $file = $request->file;

        $fileName = $file->storeAs(
            '',
            pathinfo($file->hashName(), PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension()
        );
        return CustomResponseBuilder::success([
            'filepath' => $fileName,
            'fullfilepath' => Storage::url($fileName),
            'filename' => $file->getClientOriginalName(),
        ]);
    }
}
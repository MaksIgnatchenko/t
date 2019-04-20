<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 20.04.19
 *
 */

namespace App\Modules\Files\Services;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * @var
     */
    protected $originImage;

    /**
     * ImageService constructor.
     * @param $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->originImage = $file;
    }

    public function orientate()
    {
        $extension = $this->originImage->getClientOriginalExtension();
        $img = Image::make($this->originImage->getRealpath());
        $img->orientate();
        return $img->encode($extension);
    }
}
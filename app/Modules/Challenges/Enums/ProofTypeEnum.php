<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\Modules\Challenges\Enums;

class ProofTypeEnum
{
    public const PHOTO = 'photo';
    public const MULTIPLE_PHOTOS = 'multiple_photos';
    public const VIDEO = 'video';
    public const MULTIPLE_VIDEOS = 'multiple_videos';
    public const SCREENSHOT = 'screenshot';
    public const MULTIPLE_SCREENSHOTS = 'multiple_screenshots';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::PHOTO,
            self::MULTIPLE_PHOTOS,
            self::VIDEO,
            self::MULTIPLE_VIDEOS,
            self::SCREENSHOT,
            self::MULTIPLE_SCREENSHOTS
        ];
    }

    /**
     * @return array
     */
    public static function getMultipleTypes() : array
    {
        return [
            self::MULTIPLE_PHOTOS,
            self::MULTIPLE_VIDEOS,
            self::MULTIPLE_SCREENSHOTS
        ];
    }
}
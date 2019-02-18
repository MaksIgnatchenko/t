<?php
/**
 * Created by Andrei Podgornyi, Appus Studio LP on 05.12.18
 */

namespace App\Modules\Users\Customer\Services\Social;

class DeviceEnum
{
    public const IOS = 'ios';
    public const ANDROID = 'android';

    /**
     * @return array
     */
    public static function toArray(): array
    {
        return [
            self::IOS,
            self::ANDROID,
        ];
    }

    /**
     * @return string
     */
    public static function toString(): string
    {
        return implode(',', self::toArray());
    }
}

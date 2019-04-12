<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 10.04.19
 *
 */

namespace App\Modules\Challenges\Enums;

class ChallengeStatusEnum
{
    public const WAITING = 'waiting';
    public const ACTIVE = 'active';
    public const END = 'end';

    /**
     * @return array
     */
    public function getAll() : array
    {
        return [
            self::WAITING,
            self::ACTIVE,
            self::END,
        ];
    }
}
<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Enums;

class ProofStatusEnum
{
    public const PENDING = 'pending';
    public const ACCEPTED = 'accepted';
    public const REJECTED = 'rejected';

    /**
     * @return array
     */
    public static function getAll() : array
    {
        return [
            self::PENDING,
            self::ACCEPTED,
            self::REJECTED,
        ];
    }

    /**
     * @return array
     */
    public static function getAbleForDeletionStatuses() : array
    {
        return [
            self::REJECTED,
            self::PENDING,
        ];
    }
}
<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Interfaces;

interface AbleToContainProofs
{
    /**
     * @return int
     */
    public function getRequiredProofsCount() : int;

    /**
     * @return string
     */
    public function getRequiredProofsType() : string;

    /**
     * @return int|null
     */
    public function getRequiredVideoDuration() : ?int;
}
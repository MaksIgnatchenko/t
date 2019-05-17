<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.05.19
 *
 */

namespace App\Modules\Users\User\Models;

interface CanGenerateJwtToken
{
    /**
     * @return string
     */
    public function generateToken() : string;
}
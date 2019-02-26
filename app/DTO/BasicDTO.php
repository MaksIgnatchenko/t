<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.02.19
 *
 */

namespace App\DTO;

class BasicDTO
{
    public function getJsVars() {
        $siteVars = config('custom');
    }
}
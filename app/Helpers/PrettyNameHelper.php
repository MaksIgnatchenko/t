<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.03.19
 *
 */

namespace App\Helpers;

class PrettyNameHelper
{
    /**
     * @param string $string
     * @return string
     */
    public static function transform(string $string) : string
    {
        return ucfirst(str_replace('_', ' ', $string));
    }
}
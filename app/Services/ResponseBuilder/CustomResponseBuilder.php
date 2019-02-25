<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 22.02.19
 *
 */

namespace App\Services\ResponseBuilder;

use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class CustomResponseBuilder extends ResponseBuilder
{
    protected static function buildResponse($success, $api_code, $message, $data = null, array $trace_data = null)
    {
        $response = parent::buildResponse($success, $api_code, $message, $data, $trace_data);
        unset($response['locale']);
        unset($response['message']);
        return $response;
    }
}
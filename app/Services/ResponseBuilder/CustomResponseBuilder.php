<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 22.02.19
 *
 */

namespace App\Services\ResponseBuilder;

use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class CustomResponseBuilder extends ResponseBuilder
{
    /**
     * Default HTTP code to be used with error responses
     */
    const DEFAULT_HTTP_CODE_ERROR = HttpResponse::HTTP_OK;

    /**
     * Creates standardised API response array. If you set APP_DEBUG to true, 'code_hex' field will be
     * additionally added to reported JSON for easier manual debugging.
     *
     * @param boolean    $success    @true if reposnse indicates success, @false otherwise
     * @param integer    $api_code   response code
     * @param string     $message    message to return
     * @param mixed      $data       API response data if any
     * @param array|null $trace_data optional debug data array to be added to returned JSON.
     *
     * @return array response ready to be encoded as json and sent back to client
     *
     * @throws \RuntimeException in case of missing or invalid "classes" mapping configuration
     */
    protected static function buildResponse($success, $api_code, $message, $data = null, array $trace_data = null)
    {
        $response = parent::buildResponse($success, $api_code, $message, $data, $trace_data);
        unset($response['locale']);
        unset($response['message']);
        return $response;
    }

    /**
     * Builds error Response object. Supports optional arguments passed to Lang::get() if associated error
     * message uses placeholders as well as return data payload
     *
     * @param integer      $api_code         internal API code to be returned
     * @param array|null   $lang_args        if array, then this passed as arguments to Lang::get() to build final string.
     * @param mixed|null   $data             payload array to be returned in 'data' node or response object
     * @param integer|null $http_code        optional HTTP status code to be used with this response or @null for default
     * @param integer|null $encoding_options see http://php.net/manual/en/function.json-encode.php or @null to use config's value or defaults
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public static function error($api_code, array $lang_args = null, $data = null, $http_code = null, $encoding_options = null)
    {
        return static::buildErrorResponse($data, $api_code, $http_code, $lang_args, $encoding_options);
    }

    protected static function buildErrorResponse($data, $api_code, $http_code, $lang_args = null, $message = null,
                                                 $headers = null, $encoding_options = null, $debug_data = null)
    {
        if ($http_code === null) {
            $http_code = static::DEFAULT_HTTP_CODE_ERROR;
        }

        if ($http_code === HttpResponse::HTTP_BAD_REQUEST) {
            $http_code = static::DEFAULT_HTTP_CODE_ERROR;
        }

        if (!is_int($api_code)) {
            throw new \InvalidArgumentException(sprintf('api_code must be integer (%s given)', gettype($api_code)));
        }
        if ($api_code === static::DEFAULT_API_CODE_OK) {
            throw new \InvalidArgumentException(sprintf('api_code must not be %d (DEFAULT_API_CODE_OK)', static::DEFAULT_API_CODE_OK));
        }
        if ((!is_array($lang_args)) && ($lang_args !== null)) {
            throw new \InvalidArgumentException(sprintf('lang_args must be either array or null (%s given)', gettype($lang_args)));
        }
        if (!is_int($http_code)) {
            throw new \InvalidArgumentException(sprintf('http_code must be integer (%s given)', gettype($http_code)));
        }

        if ($message === null) {
            $message = $api_code;
        }
        if ($headers === null) {
            $headers = [];
        }

        return static::make(false, $api_code, $message, $data, $http_code, $lang_args, $headers, $encoding_options, $debug_data);
    }
}
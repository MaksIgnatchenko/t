<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 22.02.19
 *
 */

namespace App\Services\ResponseBuilder;

use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use MarcinOrlowski\ResponseBuilder\ExceptionHandlerHelper;
use Exception;
use MarcinOrlowski\ResponseBuilder\BaseApiCodes;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;

class CustomExceptionHandlerHelper extends ExceptionHandlerHelper
{
    /**
     * @param Exception $exception         Exception to be processed
     * @param string    $exception_type    Category of the exception
     * @param integer   $default_api_code  API code to return
     * @param integer   $default_http_code HTTP code to return
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected static function error(Exception $exception, $exception_type,
                                    $default_api_code, $default_http_code = ResponseBuilder::DEFAULT_HTTP_CODE_ERROR)
    {
//        dd($exception->validator->errors()->messages());
        $base_config = 'response_builder.exception_handler.exception';

        $api_code = Config::get("{$base_config}.{$exception_type}.code", $default_api_code);
        $http_code = Config::get("{$base_config}.{$exception_type}.http_code", 0);

        // check if this is valid HTTP error code
        if ($http_code === 0) {
            // no code, let's try getting the exception status
            if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                $http_code = $exception->getStatusCode();
            } else {
                $http_code = $exception->getCode();
            }

            // can it be considered valid HTTP error code?
            if (($http_code < 400) || ($http_code > 499)) {
                $http_code = 0;
            }
        } elseif (($http_code < 400) || ($http_code > 499)) {
            $http_code = 0;
        }

        // still no code? use default
        if ($http_code === 0) {
            $http_code = $default_http_code;
        }

        $trace_data = null;
        if (Config::get(ResponseBuilder::CONF_KEY_DEBUG_EX_TRACE_ENABLED, false)) {
            $trace_data = [
                Config::get(ResponseBuilder::CONF_KEY_DEBUG_EX_TRACE_KEY, ResponseBuilder::KEY_TRACE) => [
                    ResponseBuilder::KEY_CLASS => get_class($exception),
                    ResponseBuilder::KEY_FILE  => $exception->getFile(),
                    ResponseBuilder::KEY_LINE  => $exception->getLine(),
                ],
            ];
        }

        // optional payload to return
        $data = null;

        // let's figure out what event we are handling now
        if (Config::get("{$base_config}.http_not_found.code", BaseApiCodes::EX_HTTP_NOT_FOUND) === $api_code) {
            $base_api_code = BaseApiCodes::EX_HTTP_NOT_FOUND;
        } elseif (Config::get("{$base_config}.http_service_unavailable.code", BaseApiCodes::EX_HTTP_SERVICE_UNAVAILABLE) === $api_code) {
            $base_api_code = BaseApiCodes::EX_HTTP_SERVICE_UNAVAILABLE;
        } elseif (Config::get("{$base_config}.http_exception.code", BaseApiCodes::EX_HTTP_EXCEPTION) === $api_code) {
            $base_api_code = BaseApiCodes::EX_HTTP_EXCEPTION;
        } elseif (Config::get("{$base_config}.uncaught_exception.code", BaseApiCodes::EX_UNCAUGHT_EXCEPTION) === $api_code) {
            $base_api_code = BaseApiCodes::EX_UNCAUGHT_EXCEPTION;
        } elseif (Config::get("{$base_config}.authentication_exception.code", BaseApiCodes::EX_AUTHENTICATION_EXCEPTION) === $api_code) {
            $base_api_code = BaseApiCodes::EX_AUTHENTICATION_EXCEPTION;
        } elseif (Config::get("{$base_config}.validation_exception.code", BaseApiCodes::EX_VALIDATION_EXCEPTION) === $api_code) {
            $base_api_code = BaseApiCodes::EX_VALIDATION_EXCEPTION;
            $data = [ResponseBuilder::KEY_MESSAGES => static::convertMessagesToIntCode($exception->validator->errors()->messages())];
        } else {
            $base_api_code = BaseApiCodes::NO_ERROR_MESSAGE;
        }

        $key = BaseApiCodes::getCodeMessageKey($api_code);
        if ($key === null) {
            $key = BaseApiCodes::getReservedCodeMessageKey($base_api_code);
        }

        // let's build error message
        $error_message = '';
        $ex_message = trim($exception->getMessage());

        // ensure we won't fail due to exception incorect encoding
        if (!mb_check_encoding($ex_message, 'UTF-8')) {
            // let's check there's iconv and mb_string available
            if (function_exists('iconv') && function_exists('mb_detec_encoding')) {
                $ex_message = iconv(mb_detect_encoding($ex_message, mb_detect_order(), true), 'UTF-8', $ex_message);
            } else {
                // lame fallback, in case there's no iconv/mb_string installed
                $ex_message = htmlspecialchars_decode(htmlspecialchars($ex_message, ENT_SUBSTITUTE, 'UTF-8'));
            }
        }

        if (Config::get('response_builder.exception_handler.use_exception_message_first', true)) {
            if ($ex_message === '') {
                $ex_message = get_class($exception);
            } else {
                $error_message = $ex_message;
            }
        }

        if ($error_message === '') {
            $error_message = Lang::get($key, [
                'api_code' => $api_code,
                'message'  => $ex_message,
                'class'    => get_class($exception),
            ]);
        }
        return CustomResponseBuilder::errorWithMessageAndDataAndDebug($api_code, $error_message, $data, $http_code, null, $trace_data);
    }

    protected static function convertMessagesToIntCode(array $fields)
    {
        return array_map(function ($field) {
            return array_map('intval', $field);
        }, $fields);
    }
}
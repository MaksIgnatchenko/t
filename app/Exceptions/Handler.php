<?php

namespace App\Exceptions;

use App\Services\ResponseBuilder\ApiCode;
use App\Services\ResponseBuilder\CustomExceptionHandlerHelper;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\Access\AuthorizationException as UnauthorizedActionException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        if (app()->bound('sentry') && $this->shouldReport($exception)) {
            app('sentry')->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->wantsJson()) {
            if ($exception instanceof UnauthorizedActionException) {
                return CustomResponseBuilder::error(ApiCode::UNAUTHORISED_ACTION);
            }
            if ($exception instanceof ModelNotFoundException || $exception instanceof QueryException) {
                return CustomResponseBuilder::error(ApiCode::NO_SUCH_ITEM);
            }
            if ($exception instanceof AuthenticationException) {
                return CustomResponseBuilder::error(ApiCode::UNAUTHENTICATED);
            }
            return CustomExceptionHandlerHelper::render($request, $exception);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {

            return redirect('/home');
        }

        return parent::render($request, $exception);
    }
}

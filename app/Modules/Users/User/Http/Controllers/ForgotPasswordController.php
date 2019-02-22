<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 10.11.2017
 */

namespace App\Modules\Users\User\Http\Controllers;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @return Response
     */
    protected function sendResetLinkResponse()
    {
        return ResponseBuilder::success();
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @return Response
     */
    protected function sendResetLinkFailedResponse()
    {
        return ResponseBuilder::error(ApiCode::NO_SUCH_EMAIL);
    }

    /**
     * @param Request $request
     */
    protected function validateEmail(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::exists('users')->where(function ($query) {
                    $query->where('is_registration_completed', true);
                }),
            ],
        ]);
    }
}

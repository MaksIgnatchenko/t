<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Http\Requests\StartVerificationRequest;
use App\Modules\Users\User\Http\Requests\UpdateProfileRequest;
use App\Modules\Users\User\Http\Requests\VerifyCodeRequest;
use App\Modules\Users\User\Models\User;
use App\Modules\Users\User\Services\AuthyApi\AuthyApiInterface;
use App\Services\ResponseBuilder\ApiCode;
use App\Services\ResponseBuilder\CustomResponseBuilder;
use Authy\AuthyApi;
use Authy\AuthyResponse;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class RegisterController extends Controller
{
    use AuthResponseTrait;

    /** @var AuthyApi */
    protected $authyApi;

    /**
     * RegisterController constructor.
     * @param AuthyApi $authyApi
     */
    public function __construct(AuthyApiInterface $authyApi)
    {
        $this->authyApi = $authyApi;
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    protected function guard(): Guard
    {
        return Auth::guard('api');
    }

    /**
     * @param StartVerificationRequest $request
     * @return Response
     */
    public function startVerification(StartVerificationRequest $request)
    {
        $phoneNumber = $request->get('phone_number');
        $countryCode = $request->get('country_code');

        $result = $this->authyApi->phoneVerificationStart($phoneNumber, $countryCode);

        if (!$result->ok()) {
            return CustomResponseBuilder::error(ApiCode::TWILIO_SEND_SMS_ERROR);
        }

        return CustomResponseBuilder::success();
    }

    /**
     * @param VerifyCodeRequest $request
     * @return Response
     */
    public function verifyCode(VerifyCodeRequest $request)
    {
        $phoneNumber = $request->get('phone_number');
        $countryCode = $request->get('country_code');
        $code = $request->get('code');

        $result = $this->authyApi->phoneVerificationCheck($phoneNumber, $countryCode, $code);

        if (!$result->ok()) {
            return CustomResponseBuilder::error(ApiCode::TWILIO_WRONG_VERIFICATION_CODE);
        }

        $user = app(User::class);
        $user->fill($request->all());
        $user->save();

        $credentials = $request->only('phone_number', 'password');
        $token = $this->guard('api')->attempt($credentials);

        return CustomResponseBuilder::success($this->getTokenStructure($token));
    }

    /**
     * @param UpdateProfileRequest $request
     * @return Response
     */
    public function updateProfile(UpdateProfileRequest $request): Response
    {
        $user = Auth::user();
        $userData = array_merge($request->all(), [
            'is_registration_completed' => true,
        ]);

        $user->fill($userData);
        $user->save();

        return CustomResponseBuilder::success();
    }

    /**
     * @param AuthyResponse $response
     * @return JsonResponse
     */
    protected function twilioErrorResponse(AuthyResponse $response): JsonResponse
    {
        return response()->json([
            'message' => 'Twilio error',
            'errors' => [
                'twilio' => [$response->message()],
            ],
        ], 400);
    }
}

<?php

namespace App\Modules\Users\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\User\Enums\LoginTypeEnum;
use App\Modules\Users\User\Http\Requests\StartVerificationRequest;
use App\Modules\Users\User\Http\Requests\UpdateProfileRequest;
use App\Modules\Users\User\Http\Requests\VerifyCodeRequest;
use App\Modules\Users\User\Models\User;
use Authy\AuthyApi;
use Authy\AuthyResponse;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use \Exception;


class RegisterController extends Controller
{
    use AuthResponseTrait;

    /** @var AuthyApi */
    protected $authyApi;

    /**
     * RegisterController constructor.
     * @param AuthyApi $authyApi
     */
    public function __construct(AuthyApi $authyApi)
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
     * @return JsonResponse
     */
    public function startVerification(StartVerificationRequest $request)
    {
        $phoneNumber = $request->get('phone_number');
        $countryCode = $request->get('country_code');

        $result = $this->authyApi->phoneVerificationStart($phoneNumber, $countryCode);

        if (!$result->ok()) {
            return $this->twilioErrorResponse($result);
        }

        return response()->json(['success' => true]);
    }

    /**
     * @param VerifyCodeRequest $request
     * @return JsonResponse
     */
    public function verifyCode(VerifyCodeRequest $request)
    {
        $phoneNumber = $request->get('phone_number');
        $countryCode = $request->get('country_code');
        $code = $request->get('code');

        $result = $this->authyApi->phoneVerificationCheck($phoneNumber, $countryCode, $code);

        if (!$result->ok()) {
            return $this->twilioErrorResponse($result);
        }

        $user = app(User::class);
        $user->fill($request->all());
        $user->save();

        $credentials = $request->only('phone_number', 'password');
        $token = $this->guard('api')->attempt($credentials);

        return $this->respondWithToken($token);
    }

    /**
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        $user = Auth::user();

        $userData = array_merge($request->all(), [
            'is_registration_completed' => true,
        ]);

        $user->fill($userData);
        $user->save();

        return response()->json([
            'success' => true,
        ]);
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

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/test', function (Request $request) {
    return \App\Services\ResponseBuilder\CustomResponseBuilder::success();
});

if (\App\Enums\AppEnvironmentEnum::LOCAL === env('APP_ENV')
    || (\App\Enums\AppEnvironmentEnum::DEVELOP == env('APP_ENV'))) {
    Route::post('wipe', function() {
        \Illuminate\Support\Facades\DB::table('users')->delete();
        return \App\Services\ResponseBuilder\CustomResponseBuilder::success();
    });

    Route::post('user/coins', function(\App\Modules\Users\User\Http\Requests\CoinRequest $request) {
        $user = \Illuminate\Support\Facades\Auth::user();
        $user->coins += $request->amount;
        $user->save();
        return \App\Services\ResponseBuilder\CustomResponseBuilder::success();
    })->middleware('auth:api');

    Route::get('test-proof', function() {
        $proof = \App\Modules\Challenges\Models\Proof::first();
        return \App\Services\ResponseBuilder\CustomResponseBuilder::success($proof);
    });
}



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
    || \App\Enums\AppEnvironmentEnum::DEVELOP) {
    Route::post('wipe', function() {
        \Illuminate\Support\Facades\DB::table('users')->delete();
        return \App\Services\ResponseBuilder\CustomResponseBuilder::success();
    });
}


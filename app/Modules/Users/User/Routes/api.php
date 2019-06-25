<?php
/**
 * Created by Artem Petrov, Appus Studio on 11/1/17.
 */

Route::group([
    'prefix' => 'auth',
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');

    Route::post('start', 'RegisterController@startVerification');
    Route::post('verify', 'RegisterController@verifyCode');
    Route::post('profile', 'RegisterController@updateProfile')->middleware('auth:api');
    Route::post('me/company', 'CompanyParticipationController')->middleware('auth:api');
});

Route::get('user/{user}', 'UserController@show')->middleware('auth:api');

$this->group([
    'prefix' => 'password',
], function () {

    Route::post('change', 'ChangePasswordController@change')->name('password.change');
    Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
});

Route::get('rating', 'RatingController')->middleware('auth:api');

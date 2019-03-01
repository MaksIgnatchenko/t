<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

Route::group(['middleware' => ['api', 'auth:api'], 'prefix' => 'challenge'], function () {
    Route::get('/', 'ChallengeController@index');
    Route::get('/{challenge}', 'ChallengeController@show');

    Route::get('/{challenge}/participation', 'ChallengeParticipationController@index');
    Route::post('/{challenge}/participation', 'ChallengeParticipationController@store');
});
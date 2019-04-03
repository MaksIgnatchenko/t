<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

Route::group(['middleware' => ['api', 'auth:api']], function () {
    Route::get('challenge/', 'ChallengeController@index');
    Route::get('challenge/{challenge}', 'ChallengeController@show');

    Route::get('challenge/{challenge}/participation', 'ChallengeParticipationController@index');
    Route::post('challenge/{challenge}/participation', 'ChallengeParticipationController@store');
    Route::resource('challenge.proof', 'ProofController', ['api' => 'prefix'])->only(['show', 'store', 'delete']);
});
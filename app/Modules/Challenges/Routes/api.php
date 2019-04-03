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
    Route::resource('challenge.proof', 'ProofController', [
        'names' => [
            'show' => 'api.proof.show',
            'store' => 'api.proof.store',
            'destroy' => 'api.proof.destroy'
        ]])->only(['show', 'store', 'destroy']);
});
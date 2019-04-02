<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('challenge', 'ChallengeController')->only(['index', 'show', 'create', 'store']);
    Route::resource('challenge.proof', 'ProofController')->only(['index', 'show', 'update']);
});
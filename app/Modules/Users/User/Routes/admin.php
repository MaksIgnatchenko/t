<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.02.19
 *
 */

Route::group(['middleware' => 'auth:admin'], function () {
    Route::resource('users', 'UserController')->only(['index', 'show', 'update']);
    Route::put('reset-coins', 'UserController@resetCoinsAndRatingForAllUsers')->name('reset-coins');
});
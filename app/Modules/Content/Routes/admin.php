<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

Route::group(['middleware' => 'auth:admin', 'prefix' => 'content'], function () {

    Route::get('/', 'ContentController@index')->name('content.index');
    Route::put('/{content}', 'ContentController@update')->name('content.update');

});
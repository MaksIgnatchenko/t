<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

Route::group(['middleware' => 'auth:admin'], function () {

    Route::post('/fileupload', 'FileController@upload')->name('fileupload');

});
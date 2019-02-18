<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 16.11.2017
 */

Route::group([
    'prefix' => 'password',
], function () {
    $this->get('reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('reset', 'ResetPasswordController@reset')->name('password.restore');
    $this->get('success', 'ResetPasswordController@success')->name('password.success');
});

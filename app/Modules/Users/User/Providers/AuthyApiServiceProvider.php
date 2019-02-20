<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 12:35
 */

namespace App\Modules\Users\User\Providers;

use Authy\AuthyApi;
use Illuminate\Support\ServiceProvider;

class AuthyApiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $apiKey = config('services.authy.api_key');

        $this->app->bind('Authy\AuthyApi', function () use ($apiKey) {
            return new AuthyApi($apiKey);
        });
    }
}
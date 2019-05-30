<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 12:35
 */

namespace App\Modules\Users\User\Providers;

use App\Enums\AppEnvironmentEnum;
use App\Modules\Users\Observers\UserObserver;
use App\Modules\Users\User\Models\User;
use App\Modules\Users\User\Services\AuthyApi\AuthyApi;
use App\Modules\Users\User\Services\AuthyApi\AuthyApiInterface;
use App\Modules\Users\User\Services\AuthyApi\AuthyApiStub;
use Illuminate\Support\Facades\App;
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
        User::observe(UserObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $apiKey = config('services.authy.api_key');

        if (App::environment(AppEnvironmentEnum::PRODUCTION)) {
            $this->app->bind(AuthyApiInterface::class, function () use ($apiKey) {
                return new AuthyApi($apiKey);
            });
        } else {
            $this->app->bind(AuthyApiInterface::class, function () use ($apiKey) {
                return new AuthyApiStub($apiKey);
            });
        }
    }
}
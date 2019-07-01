<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-19
 * Time: 12:35
 */

namespace App\Modules\Users\User\Providers;

use App\Modules\Users\Services\UserEnvironmentService\Factories\UserEnvironmentServiceFactory;
use App\Modules\Users\Services\UserEnvironmentService\Interfaces\UserEnvironmentServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class UserEnvironmentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserEnvironmentServiceInterface::class, function() {
            return UserEnvironmentServiceFactory::getInstance(Auth::user());
        });
    }
}

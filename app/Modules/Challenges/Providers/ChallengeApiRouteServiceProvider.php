<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

namespace App\Modules\Challenges\Providers;

use App\Modules\Challenges\Models\Challenge;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ChallengeApiRouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Modules\Challenges\Http\Controllers\Api';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(__DIR__ . './../Routes/api.php');
    }

    public function boot()
    {
        parent::boot();

        Route::model('challenge', Challenge::class);
    }
}

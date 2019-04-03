<?php
/**
 * Created by Artem Petrov, Appus Studio LP on 17.11.2017
 */

namespace App\Modules\Challenges\Providers;

use App\Modules\Challenges\Models\Challenge;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class ChallengeAdminRouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Modules\Challenges\Http\Controllers\Admin';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . './../Routes/admin.php');
    }

    public function boot()
    {
        parent::boot();

//        Route::bind('challenge', function ($value) {
//            try {
//                $challenge = Challenge::where('id', (int) $value)->firstOrFail();
//            } catch (ModelNotFoundException $exception) {
//                $exception->setModel('challenge');
//                throw $exception;
//            } catch (QueryException $exception) {
//                $exception = new ModelNotFoundException();
//                $exception->setModel('challenge');
//                throw $exception;
//            }
//            return $challenge;
//        });

        Route::bind('challenge', function ($value) {
            return 'x';
        });
    }
}

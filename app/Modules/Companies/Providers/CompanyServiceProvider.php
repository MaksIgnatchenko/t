<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.06.19
 *
 */

namespace App\Modules\Companies\Providers;

use App\Modules\Challenges\Models\Company;
use App\Modules\Companies\Observers\CompanyObserver;
use Illuminate\Support\ServiceProvider;

class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Company::observe(CompanyObserver::class);
    }
}
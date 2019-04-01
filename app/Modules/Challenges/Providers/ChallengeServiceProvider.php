<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.03.19
 *
 */

namespace App\Modules\Challenges\Providers;

use App\Modules\Challenges\Models\Proof;
use App\Modules\Challenges\Observers\ProofObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ChallengeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Proof::observe(ProofObserver::class);

        Validator::extend('items_count', function ($attribute, $value, $parameters, $validator) {
            $requiredCount = (int) $parameters[0];
            if (is_array($value)) {
                return count($value) === $requiredCount;
            }
            return false;
        });

        Validator::extend('equal', function ($attribute, $value, $parameters, $validator) {
            $requiredValue = $parameters[0];
            return $requiredValue == $value;
        });
    }
}
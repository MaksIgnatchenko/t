<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.04.19
 *
 */

namespace App\Modules\Challenges\Providers;

use App\Modules\Challenges\Models\Proof;
use App\Modules\Challenges\Policies\ProofPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class ChallengeAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Proof::class => ProofPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
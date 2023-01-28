<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Bottle;
use App\Models\Preform;
use App\Models\BottleVariant;
use App\Models\PreformVariant;
use App\Policies\BottlePolicy;
use App\Policies\PreformPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\BottleVariantPolicy;
use App\Policies\PreformVariantPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}

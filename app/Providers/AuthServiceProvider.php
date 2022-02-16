<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\PropertyPolicy;
use App\Models\User;
use App\Models\Property;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        // Can read property
        Gate::define('read-property', function (User $user, Property $property) {
            return $user->id === $property->user_id;
        });

        // FIXME: come back later for this
        Gate::define('read', [PropertyPolicy::class, 'viewAny']);
    }
}

<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        Gate::define('is_admin',function(User $user) { return $user->role == "Admin" ;} );
        Gate::define('is_perusahaan',function(User $user) { return $user->role == "Perusahaan" ;} );
        Gate::define('is_alumni',function(User $user) { return $user->role == "Alumni" ;} );
    }
}

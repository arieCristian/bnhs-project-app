<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Gate::define('admin', function(User $user){
            return $user->role_id === Role::IS_ADMIN;
        });
        Gate::define('ticket', function(User $user){
            return $user->role_id === Role::IS_TICKET;
        });
        Gate::define('bar', function(User $user){
            return $user->role_id === Role::IS_BAR;
        });
        Gate::define('locker', function(User $user){
            return $user->role_id === Role::IS_LOCKER;
        });
        Gate::define('owner', function(User $user){
            return $user->role_id === Role::IS_OWNERS;
        });
        
    }
}

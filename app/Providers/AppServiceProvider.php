<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade; // Asegúrate de importar la clase Blade
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
         

        Gate::define('admin', function ($user) {
            return $user->hasRole('admin'); // Aquí asumes que tienes un método hasRole en tu modelo User
        });

        Gate::define('operador', function ($user) {
            return $user->hasRole('operador');
        });

        // Define gate for votante role
        Gate::define('votante', function ($user) {
            return $user->hasRole('votante');
        });
        
    }



}

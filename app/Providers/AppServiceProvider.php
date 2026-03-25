<?php

namespace App\Providers;

use  Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {


       Gate::define('es-admin', fn($user) => $user->tbl_roles_administrativos_NIS === 1);
       Gate::define('es-aprendiz', fn($user) => $user->tbl_roles_administrativos_NIS === 2);
       Gate::define('es-auxiliar', fn($user) => $user->tbl_roles_administrativos_NIS === 3);
       Gate::define('es-jefe_inmediato', fn($user) => $user->tbl_roles_administrativos_NIS === 4);
       Gate::define('es-Instructor', fn($user) => $user->tbl_roles_administrativos_NIS === 5);
       Gate::define('es-super_administrador', fn($user) => $user->tbl_roles_administrativos_NIS === 6);


        Gate::define('cargar-bitacoras', fn($user) => $user->tbl_roles_administrativos_NIS === 2);
        Gate::define('ver-programa', fn($user) =>$user->tbl_roles_administrativos_NIS === 5);
        Gate::define('manage-registros', fn($user) =>$user->tbl_roles_administrativos_NIS === 6);
        Gate::define('registrar-usuario', fn($user) =>$user->tbl_roles_administrativos_NIS === 6);
        Gate::define('ver-bitacoras-aprobadas', fn($user) => in_array($user->tbl_roles_administrativos_NIS, [5]));


        Paginator::useBootstrapFive();
    }
}

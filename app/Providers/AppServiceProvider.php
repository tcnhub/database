<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Seccion;
use Illuminate\Support\Facades\Schema; // Add this line

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        // este codigo es para poner disnible las secciones y categorias anidadas en todo el sitio
        if (Schema::hasTable('secciones')) {
        $secciones = Seccion::with([
            'categorias' => function($q) {
                $q->whereNull('categoria_padre_id')->with('children');
            }
        ])->get();

        View::share('secciones', $secciones);
        }

    }
}

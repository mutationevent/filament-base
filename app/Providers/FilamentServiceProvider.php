<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

//        Filament::registerRenderHook(
//            'body.end',
//            fn(): View => view('logo'),
//        );

        Filament::serving(function () {

            Filament::registerScripts([app(Vite::class)('resources/filament/filament-turbo.js')]);

            // register custom them
            Filament::registerTheme(
                app(Vite::class)('resources/css/filament.css')
            );

            

        });


    }
}

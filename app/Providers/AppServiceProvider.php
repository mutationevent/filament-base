<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Foundation\Vite;
use Illuminate\Support\ServiceProvider;

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
        Filament::serving(function () {

            // register custom them
            Filament::registerTheme(
                app(Vite::class)('resources/css/filament.css')
            );

            // change items group order in navigation menu
            // Filament::registerNavigationGroups([
            //    'Dossiers', 'Patient', 'Kit', 'Settings'
            // ]);

            Filament::registerNavigationItems([

//                NavigationItem::make('Dossier sans doc')
//                    //->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
//                    ->url('dossiers/sansdoc')
//                    ->icon('heroicon-o-presentation-chart-line')
//                    ->group('Dossiers'),


            ]);
        });
    }
}

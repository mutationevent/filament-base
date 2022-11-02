<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\BlogPostsChart;
use App\Filament\Widgets\LatestOrders;
use App\Filament\Widgets\StatsOverview;
use App\Http\Livewire\KitGenerator;
use Filament\Forms\ComponentContainer;
use Filament\Forms\Components\Component;
use Filament\Pages\Page;
use Livewire\Livewire;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-bar';

    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
            BlogPostsChart::class,
            //LatestOrders::class
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [

        ];
    }

}

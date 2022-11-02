<?php

namespace App\Filament\Widgets;

use App\Models\Dossier;
use App\Models\Kit;
use App\Models\Patient;
use App\Models\TypeTest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{

    private function getDossierCount($status = 0)
    {
        return Dossier::query()->where('status', $status)->count();
    }

    private function totalDossiers()
    {
        return Dossier::query()->count();
    }

    private function totalPatient()
    {
        return Patient::query()->count();
    }

    private function totalKit()
    {
        return Kit::query()->count();
    }

    private function totalTypeTest()
    {
        return TypeTest::query()->count();
    }


    protected function getCards(): array
    {
        return [
            Card::make('Dossiers en attente', $this->getDossierCount(0)),

            Card::make('Dossiers en cours de traitement', $this->getDossierCount(1)),

            Card::make('Dossiers traités', $this->getDossierCount(2)),

            Card::make('Dossiers validés', $this->getDossierCount(3)),

            Card::make('Total des dossiers', $this->totalDossiers()),

            Card::make('Total des patients', $this->totalPatient()),

            Card::make('Total des kits', $this->totalKit()),

            Card::make('Total des types de test', $this->totalTypeTest()),

//            Card::make('Unique views', '192.1k')
//                ->description('32k increase')
//                ->descriptionIcon('heroicon-s-trending-up')
//                ->chart([7, 2, 10, 3, 15, 4, 17])
//                ->color('success'),
        ];
    }



}

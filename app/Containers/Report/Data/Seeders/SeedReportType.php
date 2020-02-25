<?php

namespace App\Containers\Report\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class SeedReportType extends Seeder
{
    public function run()
    {
        Apiato::call('Report@SeedReportTypeTask', [[app()->getLocale() => ['name' => 'Periodinis']]]);
        Apiato::call('Report@SeedReportTypeTask', [[app()->getLocale() => ['name' => 'Mokesčiams']]]);
        Apiato::call('Report@SeedReportTypeTask', [[app()->getLocale() => ['name' => 'Pagal projektą']]]);
    }
}

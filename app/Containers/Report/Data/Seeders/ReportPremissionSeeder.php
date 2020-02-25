<?php

namespace App\Containers\Report\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ReportPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-reports', 'Find a reports in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-reports', 'Get All reports.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-reports', 'Create a report.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-reports', 'Update a report.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-reports', 'Delete a report.']);
    }
}

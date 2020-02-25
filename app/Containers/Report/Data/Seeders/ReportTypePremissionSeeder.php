<?php

namespace App\Containers\Report\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ReportTypePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-reporttypes', 'Find a reporttypes in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-reporttypes', 'Get All reporttypes.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-reporttypes', 'Create a reporttype.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-reporttypes', 'Update a reporttype.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-reporttypes', 'Delete a reporttype.']);
    }
}

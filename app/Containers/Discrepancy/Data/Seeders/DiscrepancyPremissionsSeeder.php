<?php

namespace App\Containers\Discrepancy\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class DiscrepancyPremissionsSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-discrepancities', 'Find a discrepancity in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-discrepancities', 'Get All discrepancities.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-discrepancities', 'Create a discrepancity.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-discrepancities', 'Update a discrepancity.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-discrepancities', 'Delete a discrepancity.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-discrepancities', 'Find a discrepancity in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-discrepancities', 'Get All discrepancities.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-discrepancities', 'Create a discrepancity.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-discrepancities', 'Update a discrepancity.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-discrepancities', 'Delete a discrepancity.', '', 'api']);
    }
}

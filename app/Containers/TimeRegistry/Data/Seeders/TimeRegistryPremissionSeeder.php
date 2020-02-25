<?php

namespace App\Containers\TimeRegistry\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class TimeRegistryPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-timeregistries', 'Find a timeregistries in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-timeregistries', 'Get All timeregistries.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-timeregistries', 'Create a timeregistry.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-timeregistries', 'Update a timeregistry.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-timeregistries', 'Delete a timeregistry.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-timeregistries', 'Find a timeregistries in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-timeregistries', 'Get All timeregistries.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-timeregistries', 'Create a timeregistry.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-timeregistries', 'Update a timeregistry.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-timeregistries', 'Delete a timeregistry.', '', 'api']);
    }
}

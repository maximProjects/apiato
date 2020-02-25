<?php

namespace App\Containers\Deviation\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class DeviationPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-deviations', 'Find a deviations in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-deviations', 'Get All deviations.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-deviations', 'Create a deviation.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-deviations', 'Update a deviation.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-deviations', 'Delete a deviation.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-deviations', 'Find a deviations in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-deviations', 'Get All deviations.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-deviations', 'Create a deviation.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-deviations', 'Update a deviation.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-deviations', 'Delete a deviation.', '', 'api']);
    }
}

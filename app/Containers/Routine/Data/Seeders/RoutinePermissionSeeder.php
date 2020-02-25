<?php

namespace App\Containers\Routine\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class RoutinePermissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-routine', 'Find a routine in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-routine', 'Get All routine.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-routine', 'Create a routine.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-routine', 'Update a routine.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-routine', 'Delete a routine.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-routine', 'Find a routine in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-routine', 'Get All routine.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-routine', 'Create a routine.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-routine', 'Update a routine.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-routine', 'Delete a routine.', '', 'api']);
    }
}

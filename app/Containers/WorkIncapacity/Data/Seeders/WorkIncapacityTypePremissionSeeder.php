<?php

namespace App\Containers\WorkIncapacity\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class WorkIncapacityTypePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-workincapacitytypes', 'Find a workincapacitytypes in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-workincapacitytypes', 'Get All workincapacitytypes.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-workincapacitytypes', 'Create a workincapacitytype.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-workincapacitytypes', 'Update a workincapacitytype.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-workincapacitytypes', 'Delete a workincapacitytype.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-workincapacitytypes', 'Find a workincapacitytypes in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-workincapacitytypes', 'Get All workincapacitytypes.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-workincapacitytypes', 'Create a workincapacitytype.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-workincapacitytypes', 'Update a workincapacitytype.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-workincapacitytypes', 'Delete a workincapacitytype.', '', 'api']);
    }
}

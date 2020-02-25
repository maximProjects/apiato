<?php

namespace App\Containers\WorkIncapacity\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class WorkIncapacityPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-work-incapacities', 'Find a work-incapacities in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-work-incapacities', 'Get All work-incapacities.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-work-incapacities', 'Create a workincapacity.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-work-incapacities', 'Update a workincapacity.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-work-incapacities', 'Delete a workincapacity.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-work-incapacities', 'Find a work-incapacities in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-work-incapacities', 'Get All work-incapacities.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-work-incapacities', 'Create a workincapacity.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-work-incapacities', 'Update a workincapacity.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-work-incapacities', 'Delete a workincapacity.', '', 'api']);
    }
}

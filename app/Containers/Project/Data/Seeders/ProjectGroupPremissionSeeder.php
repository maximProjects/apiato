<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ProjectGroupPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-projectgroups', 'Find a projectgroups in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-projectgroups', 'Get All projectgroups.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-projectgroups', 'Create a projectgroup.']);


        Apiato::call('Authorization@CreatePermissionTask', ['search-projectgroups', 'Find a projectgroups in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-projectgroups', 'Get All projectgroups.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-projectgroups', 'Create a projectgroup.', '', 'api']);
    }
}

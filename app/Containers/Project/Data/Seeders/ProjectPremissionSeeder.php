<?php

namespace App\Containers\Project\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ProjectPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-projects', 'Find a projects in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-projects', 'Get All projects.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-projects', 'Create a project.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-projects', 'Update a project.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-projects', 'Delete a project.']);
        Apiato::call('Authorization@CreatePermissionTask', ['clone-projects', 'Delete a clone.']);


        Apiato::call('Authorization@CreatePermissionTask', ['search-projects', 'Find a projects in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-projects', 'Get All projects.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-projects', 'Create a project.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-projects', 'Update a project.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-projects', 'Delete a project.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['clone-projects', 'Delete a clone.', '', 'api']);
    }
}

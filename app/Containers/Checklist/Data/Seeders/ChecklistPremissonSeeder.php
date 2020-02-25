<?php

namespace App\Containers\Checklist\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ChecklistPremissonSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-checklists', 'Find a checklists in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-checklists', 'Get All checklists.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-checklists', 'Create a checklist.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-checklists', 'Update a checklist.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-checklists', 'Delete a checklist.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-checklists', 'Find a checklists in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-checklists', 'Get All checklists.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-checklists', 'Create a checklist.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-checklists', 'Update a checklist.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-checklists', 'Delete a checklist.', '', 'api']);
    }
}

<?php

namespace App\Containers\Checklist\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ChecklistGroupPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-checklist-groups', 'Find a checklist groups in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-checklist-groups', 'Get All checklist groups.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-checklist-groups', 'Create a checklist group.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-checklist-groups', 'Update a checklist group.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-checklist-groups', 'Delete a checklist group.']);
    }
}

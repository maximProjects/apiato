<?php

namespace App\Containers\Document\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class DocumentPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-dcumments', 'Find a dcumments in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-dcumments', 'Get All dcumments.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-dcumments', 'Create a dcumment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-dcumments', 'Update a dcumment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-dcumments', 'Delete a dcumment.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-dcumments', 'Find a dcumments in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-dcumments', 'Get All dcumments.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-dcumments', 'Create a dcumment.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-dcumments', 'Update a dcumment.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-dcumments', 'Delete a dcumment.', '', 'api']);
    }
}

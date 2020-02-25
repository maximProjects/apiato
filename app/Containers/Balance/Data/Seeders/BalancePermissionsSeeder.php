<?php

namespace App\Containers\Balance\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class BalancePermissionsSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-balance', 'Find a balance in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-balance', 'Get All balance.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-balance', 'Create a balance.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-mounthly-balance', 'Create mounthly balance.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-balance', 'Update a balance.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-mounthly-balance', 'Update mounthly balance.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-balance', 'Delete a balance.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-balance', 'Find a balance in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-balance', 'Get All balance.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-balance', 'Create a balance.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-mounthly-balance', 'Create mounthly balance.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-balance', 'Update a balance.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-mounthly-balance', 'Update mounthly balance.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-balance', 'Delete a balance.', '', 'api']);
    }
}

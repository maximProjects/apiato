<?php

namespace App\Containers\Profile\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ProfilePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-profiles', 'Find a profiles in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-profiles', 'Get All profiles.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-profiles', 'Create a profile.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-profiles', 'Update a profile.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-profiles', 'Delete a profile.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-profiles', 'Find a profiles in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-profiles', 'Get All profiles.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-profiles', 'Create a profile.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-profiles', 'Update a profile.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-profiles', 'Delete a profile.', '', 'api']);
    }
}

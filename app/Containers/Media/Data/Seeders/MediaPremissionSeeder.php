<?php

namespace App\Containers\Media\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class MediaPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-media', 'Find a media in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-media', 'Get All media.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-media', 'Create a media.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-media', 'Update a media.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-media', 'Delete a media.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-media', 'Find a media in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-media', 'Get All media.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-media', 'Create a media.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-media', 'Update a media.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-media', 'Delete a media.', '', 'api']);
    }
}

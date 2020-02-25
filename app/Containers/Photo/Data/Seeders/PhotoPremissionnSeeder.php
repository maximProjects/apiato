<?php

namespace App\Containers\Photo\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class PhotoPremissionnSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-photos', 'Find a photos in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-photos', 'Get All photos.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-photos', 'Create a photo.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-photos', 'Update a photo.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-photos', 'Delete a photo.']);
    }
}

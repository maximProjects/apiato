<?php

namespace App\Containers\Tag\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class TagPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-tags', 'Find a tags in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-tags', 'Get All tags.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-tags', 'Create a tag.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-tags', 'Update a tag.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-tags', 'Delete a tag.']);
    }
}

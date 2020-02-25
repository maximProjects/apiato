<?php

namespace App\Containers\Address\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class AddressPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-addresses', 'Find a addresses in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-addresses', 'Get All addresses.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-addresses', 'Create a address.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-addresses', 'Update a address.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-addresses', 'Delete a address.']);
    }
}

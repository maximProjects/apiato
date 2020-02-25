<?php

namespace App\Containers\Invoice\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class InvoicePremission extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-invoice', 'Find a invoice in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-invoice', 'Get All invoice.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-invoice', 'Create a invoice.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-invoice', 'Update a invoice.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-invoice', 'Delete a invoice.']);


        Apiato::call('Authorization@CreatePermissionTask', ['search-invoice', 'Find a invoice in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-invoice', 'Get All invoice.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-invoice', 'Create a invoice.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-invoice', 'Update a invoice.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-invoice', 'Delete a invoice.', '', 'api']);
    }
}

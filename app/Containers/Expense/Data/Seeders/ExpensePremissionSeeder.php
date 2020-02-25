<?php

namespace App\Containers\Expense\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class ExpensePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-expenses', 'Find a expenses in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-expenses', 'Get All expenses.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-expenses', 'Create a expense.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-expenses', 'Update a expense.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-expenses', 'Delete a expense.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-expenses', 'Find a expenses in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-expenses', 'Get All expenses.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-expenses', 'Create a expense.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-expenses', 'Update a expense.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-expenses', 'Delete a expense.', '', 'api']);
    }
}

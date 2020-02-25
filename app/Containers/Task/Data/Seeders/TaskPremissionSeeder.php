<?php

namespace App\Containers\Task\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class TaskPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-tasks', 'Find a tasks in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-tasks', 'Get All tasks.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-tasks', 'Create a task.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-tasks', 'Update a task.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-tasks', 'Delete a task.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-tasks', 'Find a tasks in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-tasks', 'Get All tasks.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-tasks', 'Create a task.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-tasks', 'Update a task.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-tasks', 'Delete a task.', '', 'api']);
    }
}

<?php

namespace App\Containers\Timer\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class TimerPermissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-timer', 'Find a timer in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-timer', 'Get All timer.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-timer', 'Create a timer.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-timer', 'Update a timer.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-timer', 'Delete a timer.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-timer', 'Find a timer in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-timer', 'Get All timer.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-timer', 'Create a timer.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-timer', 'Update a timer.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-timer', 'Delete a timer.', '', 'api']);
    }
}

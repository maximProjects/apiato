<?php

namespace App\Containers\Message\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class MessagePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-messages', 'Find a messages in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-messages', 'Get All messages.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-messages', 'Create a message.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-messages', 'Update a message.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-messages', 'Delete a message.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-messages', 'Find a messages in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-messages', 'Get All messages.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-messages', 'Create a message.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-messages', 'Update a message.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-messages', 'Delete a message.', '', 'api']);
    }
}

<?php

namespace App\Containers\Checkpoint\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class CheckpointPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-checkpoints', 'Find a checkpoints in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-checkpoints', 'Get All checkpoints.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-checkpoints', 'Create a checkpoint.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-checkpoints', 'Update a checkpoint.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-checkpoints', 'Delete a checkpoint.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-checkpoints', 'Find a checkpoints in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-checkpoints', 'Get All checkpoints.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-checkpoints', 'Create a checkpoint.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-checkpoints', 'Update a checkpoint.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-checkpoints', 'Delete a checkpoint.', '', 'api']);
    }
}

<?php

namespace App\Containers\Job\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class JobPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-jobs', 'Find a jobs in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-jobs', 'Get All jobs.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-jobs', 'Create a job.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-jobs', 'Update a job.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-jobs', 'Delete a job.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-jobs', 'Find a jobs in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-jobs', 'Get All jobs.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-jobs', 'Create a job.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-jobs', 'Update a job.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-jobs', 'Delete a job.', '', 'api']);
    }
}

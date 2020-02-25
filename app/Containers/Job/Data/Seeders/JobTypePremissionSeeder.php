<?php

namespace App\Containers\Job\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class JobTypePremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-job-types', 'Find a job types in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-job-types', 'Get All job types.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-job-types', 'Create a job type.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-job-types', 'Update a job type.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-job-types', 'Delete a job type.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-job-types', 'Find a job types in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-job-types', 'Get All job types.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-job-types', 'Create a job type.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-job-types', 'Update a job type.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-job-types', 'Delete a job type.', '', 'api']);
    }
}

<?php

namespace App\Containers\Attachment\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class AttachmentPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-attachments', 'Find a attachments in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-attachments', 'Get All attachments.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-attachments', 'Create a attachment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-attachments', 'Update a attachment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-attachments', 'Delete a attachment.']);
    }
}

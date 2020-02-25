<?php

namespace App\Containers\Comment\Data\Seeders;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Seeders\Seeder;

class CommentPremissionSeeder extends Seeder
{
    public function run()
    {
        Apiato::call('Authorization@CreatePermissionTask', ['search-comments', 'Find a comments in the DB.']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-comments', 'Get All comments.']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-comments', 'Create a comment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-comments', 'Update a comment.']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-comments', 'Delete a comment.']);

        Apiato::call('Authorization@CreatePermissionTask', ['search-comments', 'Find a comments in the DB.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['list-comments', 'Get All comments.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['create-comments', 'Create a comment.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['update-comments', 'Update a comment.', '', 'api']);
        Apiato::call('Authorization@CreatePermissionTask', ['delete-comments', 'Delete a comment.', '', 'api']);
    }
}

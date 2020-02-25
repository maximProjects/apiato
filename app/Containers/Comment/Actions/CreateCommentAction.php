<?php

namespace App\Containers\Comment\Actions;

use App\Containers\Comment\Models\Comment;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateCommentAction extends Action
{
    public function run(array $data)
    {

        $comment = Apiato::call('Comment@CreateCommentTask', [$data]);

        return $comment;
    }
}

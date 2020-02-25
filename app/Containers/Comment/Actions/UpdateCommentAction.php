<?php

namespace App\Containers\Comment\Actions;

use App\Containers\Comment\Data\Transporters\CommentTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateCommentAction extends Action
{
    public function run(CommentTransporter $data)
    {

        $comment = Apiato::call('Comment@UpdateCommentTask', [$data->id, $data->toArray()]);

        return $comment;
    }
}

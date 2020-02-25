<?php

namespace App\Containers\Message\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMessageCommentsAction extends Action
{
    public function run(int $id, array $data)
    {

        $comments = Apiato::call('Message@UpdateMessageCommentsTask', [$id, $data]);

        return $comments;
    }
}

<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDeviationCommentAction extends Action
{
    public function run(int $id, array $data)
    {
        $comments = Apiato::call('Deviation@CreateDeviationCommentsTask', [$id, $data]);

        return $comments;
    }
}

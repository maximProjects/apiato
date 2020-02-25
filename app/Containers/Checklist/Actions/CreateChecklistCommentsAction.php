<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateChecklistCommentsAction extends Action
{
    public function run(array $data)
    {
        $comments = Apiato::call('Checklist@UpdateChecklistCommentsTask', [$data['id'], [$data]]);

        return $comments;
    }
}

<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetChecklistCommentsAction extends Action
{
    public function run(Request $request)
    {
        $comments = Apiato::call('Checklist@GetChecklistCommentsTask', [$request->id]);

        return $comments;
    }
}

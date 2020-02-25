<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindChecklistByIdAction extends Action
{
    public function run(Request $request)
    {
        $checklist = Apiato::call('Checklist@FindChecklistByIdTask', [$request->id]);

        return $checklist;
    }
}

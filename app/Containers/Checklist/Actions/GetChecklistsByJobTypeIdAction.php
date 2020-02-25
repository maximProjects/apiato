<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetChecklistsByJobTypeIdAction extends Action
{
    public function run(Request $request)
    {
        $checklist = Apiato::call('Checklist@GetChecklistsByJobTypeIdTask', [$request->id]);

        return $checklist;
    }
}

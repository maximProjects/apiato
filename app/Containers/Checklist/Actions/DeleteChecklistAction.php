<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteChecklistAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Checklist@DeleteChecklistTask', [$request->id]);
    }
}

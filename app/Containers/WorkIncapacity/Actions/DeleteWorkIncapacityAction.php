<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteWorkIncapacityAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('WorkIncapacity@DeleteWorkIncapacityTask', [$request->id]);
    }
}

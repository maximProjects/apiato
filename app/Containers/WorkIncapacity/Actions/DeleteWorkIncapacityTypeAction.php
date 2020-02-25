<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteWorkIncapacityTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('WorkIncapacity@DeleteWorkIncapacityTypeTask', [$request->id]);
    }
}

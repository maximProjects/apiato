<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDeviationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Deviation@DeleteDeviationTask', [$request->id]);
    }
}

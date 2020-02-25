<?php

namespace App\Containers\Timer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTimerAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Timer@DeleteTimerTask', [$request->id]);
    }
}

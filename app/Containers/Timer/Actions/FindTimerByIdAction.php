<?php

namespace App\Containers\Timer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTimerByIdAction extends Action
{
    public function run(Request $request)
    {
        $timer = Apiato::call('Timer@FindTimerByIdTask', [$request->id]);

        return $timer;
    }
}

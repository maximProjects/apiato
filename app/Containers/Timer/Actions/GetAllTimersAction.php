<?php

namespace App\Containers\Timer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTimersAction extends Action
{
    public function run(Request $request)
    {
        $timers = Apiato::call('Timer@GetAllTimersTask', [], ['addRequestCriteria']);

        return $timers;
    }
}

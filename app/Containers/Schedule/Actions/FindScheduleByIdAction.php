<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindScheduleByIdAction extends Action
{
    public function run(Request $request)
    {
        $schedule = Apiato::call('Schedule@FindScheduleByIdTask', [$request->id]);

        return $schedule;
    }
}

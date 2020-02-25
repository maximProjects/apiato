<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateScheduleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $schedule = Apiato::call('Schedule@UpdateScheduleTask', [$request->id, $data]);

        return $schedule;
    }
}

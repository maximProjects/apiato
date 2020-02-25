<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteScheduleAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Schedule@DeleteScheduleTask', [$request->id]);
    }
}

<?php

namespace App\Containers\Schedule\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateProjectScheduleAction extends Action
{
    public function run(array $data)
    {

        $schedule = Apiato::call('Schedule@CreateProjectScheduleTask', [$data]);

        return $schedule;
    }
}

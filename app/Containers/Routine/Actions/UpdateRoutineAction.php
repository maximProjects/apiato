<?php

namespace App\Containers\Routine\Actions;

use App\Containers\Routine\Data\Transporters\RoutineTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateRoutineAction extends Action
{
    public function run(RoutineTransporter $data)
    {

        $routine = Apiato::call('Routine@UpdateRoutineTask', [$data->id, $data->toArray()]);

        return $routine;
    }
}

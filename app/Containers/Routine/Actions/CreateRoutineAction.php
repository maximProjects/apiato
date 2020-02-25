<?php

namespace App\Containers\Routine\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateRoutineAction extends Action
{
    public function run(array $data)
    {
        $routine = Apiato::call('Routine@CreateRoutineTask', [$data]);

        return $routine;
    }
}

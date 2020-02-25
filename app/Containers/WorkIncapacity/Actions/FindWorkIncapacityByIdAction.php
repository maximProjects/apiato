<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindWorkIncapacityByIdAction extends Action
{
    public function run(Request $request)
    {
        $workincapacity = Apiato::call('WorkIncapacity@FindWorkIncapacityByIdTask', [$request->id]);

        return $workincapacity;
    }
}

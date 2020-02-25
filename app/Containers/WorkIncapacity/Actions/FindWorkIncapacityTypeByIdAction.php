<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindWorkIncapacityTypeByIdAction extends Action
{
    public function run(Request $request)
    {
        $workincapacitytype = Apiato::call('WorkIncapacity@FindWorkIncapacityTypeByIdTask', [$request->id]);

        return $workincapacitytype;
    }
}

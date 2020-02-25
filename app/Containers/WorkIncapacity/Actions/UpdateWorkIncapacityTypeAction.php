<?php

namespace App\Containers\WorkIncapacity\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateWorkIncapacityTypeAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $workincapacitytype = Apiato::call('WorkIncapacity@UpdateWorkIncapacityTypeTask', [$request->id, $data]);

        return $workincapacitytype;
    }
}

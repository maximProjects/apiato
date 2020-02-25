<?php

namespace App\Containers\Timer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateTimerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $timer = Apiato::call('Timer@UpdateTimerTask', [$request->id, $data]);

        return $timer;
    }
}

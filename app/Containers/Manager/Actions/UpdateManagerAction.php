<?php

namespace App\Containers\Manager\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateManagerAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $manager = Apiato::call('Manager@UpdateManagerTask', [$request->id, $data]);

        return $manager;
    }
}

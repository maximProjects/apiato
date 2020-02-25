<?php

namespace App\Containers\Confirmation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateConfirmationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $confirmation = Apiato::call('Confirmation@CreateConfirmationTask', [$data]);

        return $confirmation;
    }
}

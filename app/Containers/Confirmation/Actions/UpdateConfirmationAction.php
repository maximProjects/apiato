<?php

namespace App\Containers\Confirmation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateConfirmationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $confirmation = Apiato::call('Confirmation@UpdateConfirmationTask', [$request->id, $data]);

        return $confirmation;
    }
}

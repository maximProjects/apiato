<?php

namespace App\Containers\Confirmation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindConfirmationByIdAction extends Action
{
    public function run(Request $request)
    {
        $confirmation = Apiato::call('Confirmation@FindConfirmationByIdTask', [$request->id]);

        return $confirmation;
    }
}

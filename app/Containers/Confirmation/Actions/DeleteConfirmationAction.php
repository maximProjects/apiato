<?php

namespace App\Containers\Confirmation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteConfirmationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Confirmation@DeleteConfirmationTask', [$request->id]);
    }
}

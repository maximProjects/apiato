<?php

namespace App\Containers\Confirmation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllConfirmationsAction extends Action
{
    public function run(Request $request)
    {
        $confirmations = Apiato::call('Confirmation@GetAllConfirmationsTask', [], ['addRequestCriteria']);

        return $confirmations;
    }
}

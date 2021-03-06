<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDeviationsAction extends Action
{
    public function run(Request $request)
    {
        $deviations = Apiato::call('Deviation@GetAllDeviationsTask', [], ['addRequestCriteria']);

        return $deviations;
    }
}

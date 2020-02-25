<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTimeRegistriesAction extends Action
{
    public function run(Request $request)
    {
        $timeregistries = Apiato::call('TimeRegistry@GetAllTimeRegistriesTask', [], ['addRequestCriteria']);

        return $timeregistries;
    }
}

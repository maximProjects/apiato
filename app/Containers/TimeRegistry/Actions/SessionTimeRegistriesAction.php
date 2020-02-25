<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class SessionTimeRegistriesAction extends Action
{
    public function run(Request $request)
    {
        $timeregistries = Apiato::call('TimeRegistry@SessionTimeRegistriesTask', [], ['addRequestCriteria']);

        return $timeregistries;
    }
}

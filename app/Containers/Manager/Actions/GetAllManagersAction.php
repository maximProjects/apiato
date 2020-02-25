<?php

namespace App\Containers\Manager\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllManagersAction extends Action
{
    public function run(Request $request)
    {
        $managers = Apiato::call('Manager@GetAllManagersTask', [], ['addRequestCriteria']);

        return $managers;
    }
}

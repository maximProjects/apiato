<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTimeRegistryAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('TimeRegistry@DeleteTimeRegistryTask', [$request->id]);
    }
}

<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTimeRegistryByIdAction extends Action
{
    public function run(Request $request)
    {
        $timeregistry = Apiato::call('TimeRegistry@FindTimeRegistryByIdTask', [$request->id]);

        return $timeregistry;
    }
}

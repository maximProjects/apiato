<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetTimeRegistriesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $message = Apiato::call('TimeRegistry@GetTimeRegistriesByProjectIdTask', [$request->id]);

        return $message;
    }
}

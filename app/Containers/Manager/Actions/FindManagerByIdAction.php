<?php

namespace App\Containers\Manager\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindManagerByIdAction extends Action
{
    public function run(Request $request)
    {
        $manager = Apiato::call('Manager@FindManagerByIdTask', [$request->id]);

        return $manager;
    }
}

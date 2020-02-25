<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDeviationCommentsAction extends Action
{
    public function run(Request $request)
    {
        $deviation = Apiato::call('Deviation@GetDeviationCommentsTask', [$request->id]);

        return $deviation;
    }
}

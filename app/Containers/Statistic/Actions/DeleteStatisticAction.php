<?php

namespace App\Containers\Statistic\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteStatisticAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Statistic@DeleteStatisticTask', [$request->id]);
    }
}

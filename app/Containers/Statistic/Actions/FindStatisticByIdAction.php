<?php

namespace App\Containers\Statistic\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindStatisticByIdAction extends Action
{
    public function run(Request $request)
    {
        $statistic = Apiato::call('Statistic@FindStatisticByIdTask', [$request->id]);

        return $statistic;
    }
}

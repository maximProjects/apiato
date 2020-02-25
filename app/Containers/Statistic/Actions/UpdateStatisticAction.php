<?php

namespace App\Containers\Statistic\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateStatisticAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $statistic = Apiato::call('Statistic@UpdateStatisticTask', [$request->id, $data]);

        return $statistic;
    }
}

<?php

namespace App\Containers\Discrepancy\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDiscrepancyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Discrepancy@DeleteDiscrepancyTask', [$request->id]);
    }
}

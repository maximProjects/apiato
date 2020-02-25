<?php

namespace App\Containers\Discrepancy\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDiscrepancyByIdAction extends Action
{
    public function run(Request $request)
    {
        $discrepancy = Apiato::call('Discrepancy@FindDiscrepancyByIdTask', [$request->id]);

        return $discrepancy;
    }
}

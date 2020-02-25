<?php

namespace App\Containers\Discrepancy\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDiscrepanciesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $discrepancy = Apiato::call('Discrepancy@GetDiscrepanciesByProjectIdTask', [$request->id]);

        return $discrepancy;
    }
}

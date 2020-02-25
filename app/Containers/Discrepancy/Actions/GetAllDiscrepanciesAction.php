<?php

namespace App\Containers\Discrepancy\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDiscrepanciesAction extends Action
{
    public function run(Request $request)
    {
        $discrepancies = Apiato::call('Discrepancy@GetAllDiscrepanciesTask', [], ['addRequestCriteria']);

        return $discrepancies;
    }
}

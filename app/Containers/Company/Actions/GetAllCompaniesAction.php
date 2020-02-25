<?php

namespace App\Containers\Company\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCompaniesAction extends Action
{
    public function run(Request $request)
    {
        $companies = Apiato::call('Company@GetAllCompaniesTask', [], ['addRequestCriteria']);

        return $companies;
    }
}

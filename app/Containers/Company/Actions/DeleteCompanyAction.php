<?php

namespace App\Containers\Company\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteCompanyAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Company@DeleteCompanyTask', [$request->id]);
    }
}

<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReportTypeAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Report@DeleteReportTypeTask', [$request->id]);
    }
}

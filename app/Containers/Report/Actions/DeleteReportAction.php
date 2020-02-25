<?php

namespace App\Containers\Report\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteReportAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Report@DeleteReportTask', [$request->id]);
    }
}

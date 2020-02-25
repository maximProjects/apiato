<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDeviationAttachmentsAction extends Action
{
    public function run(Request $request)
    {
        $deviation = Apiato::call('Deviation@GetDeviationAttachmentsTask', [$request->id]);

        return $deviation;
    }
}

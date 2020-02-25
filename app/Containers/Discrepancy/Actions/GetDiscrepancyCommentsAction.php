<?php

namespace App\Containers\Discrepancy\Actions;

use App\Containers\Discrepancy\UI\API\Requests\GetDiscrepancyCommentsRequest;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDiscrepancyCommentsAction extends Action
{
    public function run(GetDiscrepancyCommentsRequest $request)
    {
        $comments = Apiato::call('Discrepancy@GetDiscrepancyCommentsTask', [$request->id]);

        return $comments;
    }
}

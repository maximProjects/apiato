<?php

namespace App\Containers\Discrepancy\Actions;

use App\Containers\Discrepancy\UI\API\Requests\GetDiscrepancyAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class GetDiscrepancyAttachmentsAction extends Action
{
    public function run(GetDiscrepancyAttachmentsRequest $request)
    {
        $media = Apiato::call('Discrepancy@GetDiscrepancyAttachmentsTask', [$request->id]);

        return $media;
    }
}

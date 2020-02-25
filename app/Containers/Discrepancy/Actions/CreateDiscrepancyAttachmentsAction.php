<?php

namespace App\Containers\Discrepancy\Actions;

use App\Containers\Discrepancy\UI\API\Requests\CreateDiscrepancyAttachmentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDiscrepancyAttachmentsAction extends Action
{
    public function run(CreateDiscrepancyAttachmentsRequest $request)
    {
        $files = $request->file();

        $media = Apiato::call('Discrepancy@UpdateDiscrepancyAttachmentsTask', [$request->id, $files]);

        return $media;
    }
}

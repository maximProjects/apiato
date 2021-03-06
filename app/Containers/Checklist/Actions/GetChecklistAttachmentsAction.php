<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetChecklistAttachmentsAction extends Action
{
    public function run(Request $request)
    {
        $media = Apiato::call('Checklist@GetChecklistAttachmentsTask', [$request->id]);

        return $media;
    }
}

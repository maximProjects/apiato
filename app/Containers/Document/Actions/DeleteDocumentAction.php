<?php

namespace App\Containers\Document\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteDocumentAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Document@DeleteDocumentTask', [$request->id]);
    }
}

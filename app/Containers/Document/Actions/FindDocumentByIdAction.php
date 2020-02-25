<?php

namespace App\Containers\Document\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindDocumentByIdAction extends Action
{
    public function run(Request $request)
    {
        $document = Apiato::call('Document@FindDocumentByIdTask', [$request->id]);

        return $document;
    }
}

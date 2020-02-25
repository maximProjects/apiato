<?php

namespace App\Containers\Document\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllDocumentsAction extends Action
{
    public function run(Request $request)
    {
        $documents = Apiato::call('Document@GetAllDocumentsTask', [], ['addRequestCriteria']);

        return $documents;
    }
}

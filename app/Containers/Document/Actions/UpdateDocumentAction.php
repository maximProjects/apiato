<?php

namespace App\Containers\Document\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateDocumentAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $document = Apiato::call('Document@UpdateDocumentTask', [$request->id, $data]);

        return $document;
    }
}

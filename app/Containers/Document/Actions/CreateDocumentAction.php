<?php

namespace App\Containers\Document\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDocumentAction extends Action
{
    public function run(array $data)
    {

        $documents = Apiato::call('Document@CreateDocumentTask', [$data]);

        return $documents;
    }
}

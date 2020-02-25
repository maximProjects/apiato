<?php

namespace App\Containers\Discrepancy\Actions;

use App\Containers\Discrepancy\UI\API\Requests\CreateDiscrepancyCommentsRequest;
use App\Ship\Parents\Actions\Action;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDiscrepancyCommentsAction extends Action
{
    public function run(int $id, array $data)
    {
        $comments = Apiato::call('Discrepancy@CreateDiscrepancyCommentsTask', [$id, $data]);

        return $comments;
    }
}

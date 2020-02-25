<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateTimeRegistryCommentAction extends Action
{
public function run(int $id, array $data)
{

    $comments = Apiato::call('TimeRegistry@CreateTimeRegistryCommentTask', [$id, $data]);

    return $comments;
}
}

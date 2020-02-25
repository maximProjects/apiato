<?php

namespace App\Containers\Task\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTaskChecklistAction extends Action
{
  public function run(array $data)
  {
    $task = Apiato::call('Task@DeleteTaskChecklistTask', [$data]);

    return $task;
  }
}

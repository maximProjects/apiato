<?php

namespace App\Containers\Task\Tasks;

use App\Containers\Checklist\Models\Checklist;
use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteTaskChecklistTask extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
      try {
        $task = $this->repository->find($data['id']);
        $checklists = Checklist::descendantsAndSelf($data['checklist_id']);

        foreach ($checklists as $ch) {
          $task->checklists()->remove($ch->id);
        }

        return $task;
      }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

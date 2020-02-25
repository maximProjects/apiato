<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetChecklistCommentsTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            $checklist = $this->repository->find($id);

            return $checklist->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

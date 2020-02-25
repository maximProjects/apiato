<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\ProjectGroup;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindProjectByIdTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

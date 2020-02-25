<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectGroupRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetProjectGroupsByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(ProjectGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($project_id)
    {
        try {
            return $this->repository->findByField('project_id', $project_id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

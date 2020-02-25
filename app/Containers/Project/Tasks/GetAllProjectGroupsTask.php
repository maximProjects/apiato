<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectGroupRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllProjectGroupsTask extends Task
{

    protected $repository;

    public function __construct(ProjectGroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}

<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindResourcePlanByIdTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository)
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

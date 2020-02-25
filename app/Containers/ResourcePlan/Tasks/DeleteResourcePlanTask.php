<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteResourcePlanTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}

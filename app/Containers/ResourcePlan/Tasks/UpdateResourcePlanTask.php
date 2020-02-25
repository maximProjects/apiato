<?php

namespace App\Containers\ResourcePlan\Tasks;

use App\Containers\ResourcePlan\Data\Repositories\ResourcePlanRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateResourcePlanTask extends Task
{

    protected $repository;

    public function __construct(ResourcePlanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Discrepancy\Tasks;

use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetDiscrepanciesByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
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

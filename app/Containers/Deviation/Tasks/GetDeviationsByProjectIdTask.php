<?php

namespace App\Containers\Deviation\Tasks;

use App\Containers\Deviation\Data\Repositories\DeviationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetDeviationsByProjectIdTask extends Task
{

    protected $repository;

    public function __construct(DeviationRepository $repository)
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

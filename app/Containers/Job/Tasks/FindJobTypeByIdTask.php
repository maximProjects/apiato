<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobTypeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindJobTypeByIdTask extends Task
{

    protected $repository;

    public function __construct(JobTypeRepository $repository)
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

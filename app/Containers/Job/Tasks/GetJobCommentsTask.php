<?php

namespace App\Containers\Job\Tasks;

use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetJobCommentsTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            $job = $this->repository->find($id);

            return $job->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

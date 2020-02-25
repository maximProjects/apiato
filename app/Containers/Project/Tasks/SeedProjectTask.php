<?php

namespace App\Containers\Project\Tasks;

use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SeedProjectTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

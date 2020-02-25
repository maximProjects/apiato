<?php

namespace App\Containers\WorkIncapacity\Tasks;

use App\Containers\WorkIncapacity\Data\Repositories\WorkIncapacityTypeRepository;
use App\Containers\WorkIncapacity\Models\WorkIncapacity;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SeedWorkIncapacityTypeTask extends Task
{

    protected $repository;

    public function __construct(WorkIncapacityTypeRepository $repository)
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

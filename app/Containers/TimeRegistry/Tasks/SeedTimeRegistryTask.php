<?php

namespace App\Containers\TimeRegistry\Tasks;

use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class SeedTimeRegistryTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
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

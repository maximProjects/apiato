<?php

namespace App\Containers\TimeRegistry\Tasks;

use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetTimeRegistryCommentsTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id)->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

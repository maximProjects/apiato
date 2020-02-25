<?php

namespace App\Containers\Confirmation\Tasks;

use App\Containers\Confirmation\Data\Repositories\ConfirmationRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateConfirmationTask extends Task
{

    protected $repository;

    public function __construct(ConfirmationRepository $repository)
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

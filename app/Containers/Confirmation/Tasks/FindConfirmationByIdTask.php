<?php

namespace App\Containers\Confirmation\Tasks;

use App\Containers\Confirmation\Data\Repositories\ConfirmationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindConfirmationByIdTask extends Task
{

    protected $repository;

    public function __construct(ConfirmationRepository $repository)
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

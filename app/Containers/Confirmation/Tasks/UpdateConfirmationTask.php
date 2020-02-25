<?php

namespace App\Containers\Confirmation\Tasks;

use App\Containers\Confirmation\Data\Repositories\ConfirmationRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateConfirmationTask extends Task
{

    protected $repository;

    public function __construct(ConfirmationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

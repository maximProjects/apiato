<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Data\Repositories\MediaRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteMediaTask extends Task
{

    protected $repository;

    public function __construct(MediaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Message\Tasks;

use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetMessageAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id)->media()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

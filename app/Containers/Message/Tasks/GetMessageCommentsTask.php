<?php

namespace App\Containers\Message\Tasks;

use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetMessageCommentsTask extends Task
{

    protected $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            $message = $this->repository->find($id);

            return $message->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

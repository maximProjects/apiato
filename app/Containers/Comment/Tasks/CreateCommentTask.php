<?php

namespace App\Containers\Comment\Tasks;

use App\Containers\Comment\Data\Repositories\CommentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCommentTask extends Task
{

    protected $repository;

    public function __construct(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $data['user_id'] = \Auth::user()->id;
            $comment = $this->repository->create($data);
            return $comment;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

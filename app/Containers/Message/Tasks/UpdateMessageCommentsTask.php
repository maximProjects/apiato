<?php

namespace App\Containers\Message\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class UpdateMessageCommentsTask extends Task
{

    protected $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $message = $this->repository->find($id);
            $commentArray = [];
            foreach($comments as $c) {
                $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                $commentArray[] = $comment;
                $message->comments()->attach($comment->id);
            }
            $commentsCollection = new Collection($commentArray);
            return $commentsCollection;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

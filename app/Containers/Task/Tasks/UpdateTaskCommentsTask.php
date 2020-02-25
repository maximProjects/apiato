<?php

namespace App\Containers\Task\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Task\Data\Repositories\TaskRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class UpdateTaskCommentsTask extends Task
{

    protected $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $task = $this->repository->find($id);
            $commentArray = [];
            foreach($comments as $c) {
                if(isset($c['content'])) {
                    $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                    $commentArray[] = $comment;
                    $task->comments()->attach($comment->id);
                }
            }
            return $commentArray;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

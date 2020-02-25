<?php

namespace App\Containers\Job\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Job\Data\Repositories\JobRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class UpdateJobCommentsTask extends Task
{

    protected $repository;

    public function __construct(JobRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $job = $this->repository->find($id);
            $commentArray = [];
            foreach($comments as $c) {
                $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                $commentArray[] = $comment;
                $job->comments()->attach($comment->id);
            }
            $commentsCollection = new Collection($commentArray);
            return $commentsCollection;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

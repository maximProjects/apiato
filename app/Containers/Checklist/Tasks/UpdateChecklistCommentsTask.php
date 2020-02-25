<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class UpdateChecklistCommentsTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $checklist = $this->repository->find($id);
            $commentArray = [];
            foreach($comments as $c) {
                $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                $commentArray[] = $comment;
                $checklist->comments()->attach($comment->id);
            }
            $commentsCollection = new Collection($commentArray);
            return $commentsCollection;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

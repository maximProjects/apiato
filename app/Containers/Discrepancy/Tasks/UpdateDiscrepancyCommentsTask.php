<?php

namespace App\Containers\Discrepancy\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Collection;

class UpdateDiscrepancyCommentsTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {
        try {
            $discrepancy = $this->repository->find($id);
            $commentArray = [];
            foreach($comments as $c) {
                $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                $commentArray[] = $comment;
                $discrepancy->comments()->attach($comment->id);
            }
            $commentsCollection = new Collection($commentArray);
            return $commentsCollection;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

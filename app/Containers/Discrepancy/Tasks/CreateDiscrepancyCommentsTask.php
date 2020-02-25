<?php

namespace App\Containers\Discrepancy\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDiscrepancyCommentsTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {

        try {
            $deviation = $this->repository->find($id);

            foreach($comments as $c) {
                if(isset($c['content'])) {
                    $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                    $commentArray[] = $comment;
                    $deviation->comments()->attach($comment->id);
                }
            }
            return $commentArray;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

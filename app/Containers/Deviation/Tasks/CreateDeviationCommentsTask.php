<?php

namespace App\Containers\Deviation\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Deviation\Data\Repositories\DeviationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDeviationCommentsTask extends Task
{

    protected $repository;

    public function __construct(DeviationRepository $repository)
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

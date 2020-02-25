<?php

namespace App\Containers\TimeRegistry\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TimeRegistry\Data\Repositories\TimeRegistryRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateTimeRegistryCommentTask extends Task
{

    protected $repository;

    public function __construct(TimeRegistryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, $comments)
    {

        try {
            $timeRegistry = $this->repository->find($id);
            foreach($comments as $c) {
                if(isset($c['content'])) {
                    $comment = Apiato::call('Comment@CreateCommentTask', [$c]);
                    $commentArray[] = $comment;
                    $timeRegistry->comments()->attach($comment->id);
                }
            }
            return $commentArray;
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

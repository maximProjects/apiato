<?php

namespace App\Containers\Deviation\Tasks;

use App\Containers\Deviation\Data\Repositories\DeviationRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetDeviationCommentsTask extends Task
{

    protected $repository;

    public function __construct(DeviationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id)->comments()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

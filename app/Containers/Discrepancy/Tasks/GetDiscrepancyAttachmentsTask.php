<?php

namespace App\Containers\Discrepancy\Tasks;

use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class GetDiscrepancyAttachmentsTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id)->media()->get();
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

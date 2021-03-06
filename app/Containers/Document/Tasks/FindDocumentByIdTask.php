<?php

namespace App\Containers\Document\Tasks;

use App\Containers\Document\Data\Repositories\DocumentRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindDocumentByIdTask extends Task
{

    protected $repository;

    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

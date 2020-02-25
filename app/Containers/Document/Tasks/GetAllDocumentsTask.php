<?php

namespace App\Containers\Document\Tasks;

use App\Containers\Document\Data\Repositories\DocumentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDocumentsTask extends Task
{

    protected $repository;

    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}

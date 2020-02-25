<?php

namespace App\Containers\Document\Tasks;

use App\Containers\Document\Data\Repositories\DocumentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDocumentTask extends Task
{

    protected $repository;

    public function __construct(DocumentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $document = $this->repository->create(array('title' => 'fdlplk'));
            dump($document);
            die;
            return $document;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

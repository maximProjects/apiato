<?php

namespace App\Containers\Invoice\Tasks;

use App\Containers\Invoice\Data\Repositories\InvoiceRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateInvoiceTask extends Task
{

    protected $repository;

    public function __construct(InvoiceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $invoice = $this->repository->create($data);
            return $invoice;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

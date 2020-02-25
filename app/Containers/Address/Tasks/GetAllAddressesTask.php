<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAddressesTask extends Task
{

    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}

<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAddressByIdTask extends Task
{

    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            var_dump($id);
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}

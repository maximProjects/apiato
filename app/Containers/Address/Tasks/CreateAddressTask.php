<?php

namespace App\Containers\Address\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAddressTask extends Task
{

    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            $address = $this->repository->create($data);
            if(isset($data['company'])) {
                $data['company']["address_id"] = $address->id;
                $company = Apiato::call('Company@CreateCompanyTask', [$data["company"]]);
            }


            return $address;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Profile\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Profile\Data\Repositories\ProfileRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateProfileTask extends Task
{

    protected $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $profile = $this->repository->create($data);
            if(isset($data['addresses'])) {
                if(!is_array($data['addresses']))
                    $data['addresses'] = [$data['addresses']];
                foreach ($data['addresses'] as $addressData) {
                    $address =  Apiato::call('Address@CreateAddressTask', [$addressData]);
                    $profile->addresses()->attach($address);
                }
            }

            return $profile;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

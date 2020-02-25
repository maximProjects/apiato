<?php

namespace App\Containers\Profile\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Profile\Data\Repositories\ProfileRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProfileTask extends Task
{

    protected $repository;

    public function __construct(ProfileRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $profile = $this->repository->update($data, $id);

            $delId = array();

            if(isset($data['addresses'])) {
                if(!is_array($data['addresses']))
                    $data['addresses'] = [$data['addresses']];
                foreach($data['addresses'] as $addressData) {
                    if(!empty($addressData['id']) && isset($addressData['id'])) {
                        $delId[] = $addressData['id'];
                        $addressNew = Apiato::call('Address@UpdateAddressTask', [$addressData['id'], $addressData]);
                    } else {
                        $addressNew = Apiato::call('Address@CreateAddressTask', [$addressData]);
                        $profile->addresses()->attach($addressNew);
                        $delId[] = $addressNew->id;

                    }
                }
            }
            $addresses = $profile->addresses()->get();

            foreach($addresses as $address) {
                if(!in_array($address->id, $delId)) {
                    $profile->addresses()->detach($address);
                    //$d = Apiato::call('Address@DeleteAddressTask', [$address->id]);
                }
            }

            return $profile;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

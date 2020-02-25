<?php

namespace App\Containers\Project\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use App\Containers\User\Models\UserType;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateProjectTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {

        try {
            $project = $this->repository->update($data, $id);


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
                        $project->addresses()->attach($addressNew);
                        $delId[] = $addressNew->id;

                    }
                }
            }


//            if(isset($data['media'])&&count($data['media'])>0) {
//                $project->media()->sync($data['media']);
//            }

//
            $addresses = $project->addresses()->get();

            foreach($addresses as $address) {
                if(!in_array($address->id, $delId)) {
                    $project->addresses()->detach($address);
                    //$d = Apiato::call('Address@DeleteAddressTask', [$address->id]);
                }
            }


            if(isset($data['clients'])) {

                $project->users()->wherePivot('type', UserType::UserTypeClient)->detach();
                if(!is_array($data['clients']))
                    $data['clients'] = [$data['clients']];
                foreach ($data['clients'] as $client) {
                    $client = isset($client['id']) ? $client['id'] : $client;
                    $project->users()->attach($client, ['type' => UserType::UserTypeClient]);
                }
            }

            if(isset($data['managers'])) {
                $project->users()->wherePivot('type', UserType::UserTypeManager)->detach();
                if(!is_array($data['managers']))
                    $data['managers'] = [$data['managers']];
                foreach ($data['managers'] as $manager) {
                    $manager = isset($manager['id']) ? $manager['id'] : $manager;
                    $project->users()->attach($manager, ['type' => UserType::UserTypeManager]);
                }
            }


            return $project;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

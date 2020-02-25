<?php

namespace App\Containers\Project\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Project\Data\Repositories\ProjectRepository;
use App\Containers\Project\Models\Project;
use Spatie\Tags\Tag;
use App\Containers\User\Models\UserType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use \Spatie\Tags\HasTags;

class CreateProjectTask extends Task
{

    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            //$data['tags'] = ['tag', 'tag2'];
            //Tag::findOrCreate('jdvo');

            $project = $this->repository->create($data);

            if(isset($data['addresses'])) {
                if(!is_array($data['addresses']))
                    $data['addresses'] = [$data['addresses']];
                foreach ($data['addresses'] as $addressData) {
                    $address =  Apiato::call('Address@CreateAddressTask', [$addressData]);
                    $project->addresses()->attach($address);
                }
            }


            if(isset($data['clients'])) {
                if(!is_array($data['clients']))
                    $data['clients'] = [$data['clients']];
                foreach ($data['clients'] as $client) {
                    $project->users()->attach($client, ['type' => UserType::UserTypeClient]);
                }
            }

            if(isset($data['managers'])) {
                if(!is_array($data['managers']))
                    $data['managers'] = [$data['managers']];
                foreach ($data['managers'] as $manager) {
                    $project->users()->attach($manager, ['type' => UserType::UserTypeManager]);
                }
            }

            return $project;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

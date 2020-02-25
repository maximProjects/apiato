<?php

namespace App\Containers\Company\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Company\Data\Repositories\CompanyRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateCompanyTask extends Task
{

    protected $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $company = $this->repository->create($data);


//            if(isset($data['users'])) {
//
//                $users = $data['users'];
//                $company->users()->detach();
//
//                if($users && !is_array($users))
//                    $users = [$users];
//
//                if(!array_key_exists('0', $users) && !empty($users))
//                    $users = [$users];
//                foreach ($users as $key => $user) {
//
//                    $company->users()->attach(is_numeric($user) ? $user : $user['id']);
//
//                }
//            }

//            if(isset($data['addresses'])) {
//                if(!is_array($data['addresses']))
//                    $data['addresses'] = [$data['addresses']];
//                foreach ($data['addresses'] as $addressData) {
//                    $address =  Apiato::call('Address@CreateAddressTask', [$addressData]);
//                    $company->addresses()->attach($address);
//                }
//            }


            return $company;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Discrepancy\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Discrepancy\Models\DiscrepancyState;
use App\Containers\Discrepancy\Models\DiscrepancyUserType;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use App\Containers\User\Models\User;
use Aws\Ec2\Exception\Ec2Exception;
use Illuminate\Support\Facades\Auth;
use Exception;

class CreateDiscrepancyTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {

        try {
            $descrepacity = null;

            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $descrepacity = Discrepancy::where([['state_id', '=', DiscrepancyState::Draft], ['created_by', '=', $user->id]])->first();
                if($descrepacity) {
                    $descrepacity->update($data);
                }
                $is_template = 1;
                if(!$descrepacity) {
                    $descrepacity = $this->repository->create($data);
                }
            } else {
                //die('create normal');
                $descrepacity = $this->repository->create($data);

            }


            if(isset($data['created_by'])) {
//                if(!is_array($data['created_by']))
//                    $data['created_by'] = [$data['created_by']];

                $created_by_arr = Apiato::call('Settings@FormatRelationArrayTask', [$data['created_by']]);
                foreach ($created_by_arr as $created_by) {
                    $descrepacity->users()->attach($created_by, ['type' => DiscrepancyUserType::CreatedBy]);
                }
            }
                if(isset($data['assigned_to'])) {
                $assigned_to_arr = Apiato::call('Settings@FormatRelationArrayTask', [$data['assigned_to']]);
//                if(!is_array($data['assigned_to']))
//                    $data['assigned_to'] = [$data['assigned_to']];
                foreach ($assigned_to_arr as $assigned_to) {
                    $descrepacity->users()->attach($assigned_to, ['type' => DiscrepancyUserType::AssignedTo]);
                }
            }


            return $descrepacity;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

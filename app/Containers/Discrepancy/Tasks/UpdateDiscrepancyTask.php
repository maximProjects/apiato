<?php

namespace App\Containers\Discrepancy\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Discrepancy\Data\Repositories\DiscrepancyRepository;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Containers\Discrepancy\Models\DiscrepancyState;
use App\Containers\Discrepancy\Models\DiscrepancyUserType;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDiscrepancyTask extends Task
{

    protected $repository;

    public function __construct(DiscrepancyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $descrepacity = Discrepancy::find($id);
            if(!isset($data['state_id'])) {


                if($descrepacity) {
                    if($descrepacity->state_id == 0) {

                        $descrepacity['state_id'] = DiscrepancyState::New;
                    }
                }
            }

            $descrepacity = $this->repository->update($data, $id);

            if(isset($created_by)) {
            $created_by = Apiato::call('Settings@FormatRelationArrayTask', [$data['created_by']]);
                $descrepacity->users()->wherePivot('type', DiscrepancyUserType::CreatedBy)->detach();
                foreach ($created_by as $created) {
                    $descrepacity->users()->attach($created, ['type' => DiscrepancyUserType::CreatedBy]);
                }
            }


            if(isset($data['assigned_to'])) {
                $assigned_to = Apiato::call('Settings@FormatRelationArrayTask', [$data['assigned_to']]);
                $descrepacity->users()->wherePivot('type', DiscrepancyUserType::AssignedTo)->detach();
                foreach ($assigned_to as $assigned) {
                    $descrepacity->users()->attach($assigned, ['type' => DiscrepancyUserType::AssignedTo]);
                }
            }

            return $descrepacity;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

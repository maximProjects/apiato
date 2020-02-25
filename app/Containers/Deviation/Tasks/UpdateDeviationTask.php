<?php

namespace App\Containers\Deviation\Tasks;

use App\Containers\Deviation\Data\Repositories\DeviationRepository;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Task\Models\DeviationState;
use App\Containers\Task\Models\TaskState;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateDeviationTask extends Task
{

    protected $repository;

    public function __construct(DeviationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $deviation = Deviation::find($id);
            if(!isset($data['state_id'])) {


                if($deviation) {
                    if($deviation->state_id == 0) {

                        $data['state_id'] = DeviationState::New;
                    }
                }
            }

            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

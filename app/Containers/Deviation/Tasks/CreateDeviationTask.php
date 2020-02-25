<?php

namespace App\Containers\Deviation\Tasks;

use App\Containers\Deviation\Data\Repositories\DeviationRepository;
use App\Containers\Deviation\Models\Deviation;
use App\Containers\Deviation\Models\DeviationState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;
use Exception;

class CreateDeviationTask extends Task
{

    protected $repository;

    public function __construct(DeviationRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {

            $deviation = null;

            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $deviation = Deviation::where([['state_id', '=', DeviationState::Draft], ['created_by', '=', $user->id]])->first();

                if($deviation) {
                    $deviation->update($data);
                }
                $is_template = 1;
                if(!$deviation) {
                    $deviation = $this->repository->create($data);
                }
            } else {
                //die('create normal');
                $deviation = $this->repository->create($data);

            }

            return $deviation;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Checkpoint\UI\API\Controllers;

use App\Containers\Checkpoint\Data\Transporters\CheckpointArrayTransporter;
use App\Containers\Checkpoint\Data\Transporters\CheckpointTransporter;
use App\Containers\Checkpoint\UI\API\Requests\CreateCheckpointRequest;
use App\Containers\Checkpoint\UI\API\Requests\DeleteCheckpointRequest;
use App\Containers\Checkpoint\UI\API\Requests\GetAllCheckpointsRequest;
use App\Containers\Checkpoint\UI\API\Requests\FindCheckpointByIdRequest;
use App\Containers\Checkpoint\UI\API\Requests\UpdateCheckpointRequest;
use App\Containers\Checkpoint\UI\API\Transformers\CheckpointTransformer;
use App\Containers\Project\Data\Transporters\ProjectTransporter;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Checkpoint\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCheckpointRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCheckpoint(CreateCheckpointRequest $request)
    {

        try{
            $dataArr = new CheckpointTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new CheckpointArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $checkpoints = [];

        $projects =[];
        foreach ($dataArr as $key => $values) {
            $checkpoints[] = Apiato::transactionalCall('Checkpoint@CreateCheckpointAction', [$values]);

        }
        $result = new Collection($checkpoints);

        return $this->created($this->transform($result, CheckpointTransformer::class));
    }

    /**
     * @param FindCheckpointByIdRequest $request
     * @return array
     */
    public function findCheckpointById(FindCheckpointByIdRequest $request)
    {
        $checkpoint = Apiato::call('Checkpoint@FindCheckpointByIdAction', [$request]);

        return $this->transform($checkpoint, CheckpointTransformer::class);
    }

    /**
     * @param GetAllCheckpointsRequest $request
     * @return array
     */
    public function getAllCheckpoints(GetAllCheckpointsRequest $request)
    {
        $checkpoints = Apiato::call('Checkpoint@GetAllCheckpointsAction', [$request]);

        return $this->transform($checkpoints, CheckpointTransformer::class);
    }

    /**
     * @param UpdateCheckpointRequest $request
     * @return array
     */
    public function updateCheckpoint(UpdateCheckpointRequest $request)
    {
        $dataTransporter = new CheckpointTransporter(
            array_merge($request->all(), [])
        );
        $checkpoint = Apiato::transactionalCall('Checkpoint@UpdateCheckpointAction', [$dataTransporter]);

        return $this->transform($checkpoint, CheckpointTransformer::class);
    }

    /**
     * @param DeleteCheckpointRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCheckpoint(DeleteCheckpointRequest $request)
    {
        Apiato::call('Checkpoint@DeleteCheckpointAction', [$request]);

        return $this->noContent();
    }
}

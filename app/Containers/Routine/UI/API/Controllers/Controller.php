<?php

namespace App\Containers\Routine\UI\API\Controllers;

use App\Containers\Routine\Data\Transporters\RoutineArrayTransporter;
use App\Containers\Routine\Data\Transporters\RoutineTransporter;
use App\Containers\Routine\UI\API\Requests\CreateRoutineRequest;
use App\Containers\Routine\UI\API\Requests\DeleteRoutineRequest;
use App\Containers\Routine\UI\API\Requests\GetAllRoutinesRequest;
use App\Containers\Routine\UI\API\Requests\FindRoutineByIdRequest;
use App\Containers\Routine\UI\API\Requests\GetRoutinesByProjectIdRequest;
use App\Containers\Routine\UI\API\Requests\UpdateRoutineRequest;
use App\Containers\Routine\UI\API\Transformers\RoutineTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Routine\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateRoutineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRoutine(CreateRoutineRequest $request)
    {
        try{
            $dataArr = new RoutineTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new RoutineArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $routines = [];

        foreach ($dataArr as $key => $values) {

            $routines[] = Apiato::transactionalCall('Routine@CreateRoutineAction', [$values]);

        }

        $result = new Collection($routines);

        return $this->created($this->transform($result, RoutineTransformer::class));
    }

    /**
     * @param FindRoutineByIdRequest $request
     * @return array
     */
    public function findRoutineById(FindRoutineByIdRequest $request)
    {
        $routine = Apiato::call('Routine@FindRoutineByIdAction', [$request]);

        return $this->transform($routine, RoutineTransformer::class);
    }

    /**
     * @param GetAllRoutinesRequest $request
     * @return array
     */
    public function getAllRoutines(GetAllRoutinesRequest $request)
    {
        $routines = Apiato::call('Routine@GetAllRoutinesAction', [$request]);

        return $this->transform($routines, RoutineTransformer::class);
    }

    public function getRoutinesByProjectId(GetRoutinesByProjectIdRequest $request)
    {
        $routines = Apiato::call('Routine@GetRoutinesByProjectIdAction', [$request]);

        return $this->transform($routines, RoutineTransformer::class);
    }


    /**
     * @param UpdateRoutineRequest $request
     * @return array
     */
    public function updateRoutine(UpdateRoutineRequest $request)
    {

        $dataTransporter = new RoutineTransporter(
            array_merge($request->all(), [])
        );
        $routine = Apiato::call('Routine@UpdateRoutineAction', [$dataTransporter]);

        return $this->transform($routine, RoutineTransformer::class);
    }

    /**
     * @param DeleteRoutineRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRoutine(DeleteRoutineRequest $request)
    {
        Apiato::call('Routine@DeleteRoutineAction', [$request]);

        return $this->noContent();
    }
}

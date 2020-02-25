<?php

namespace App\Containers\WorkIncapacity\UI\API\Controllers;

use App\Containers\Workincapacity\Data\Transporters\WorkincapacityArrayTransporter;
use App\Containers\Workincapacity\Data\Transporters\WorkincapacityTransporter;
use App\Containers\WorkIncapacity\UI\API\Requests\CreateWorkIncapacityRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\DeleteWorkIncapacityRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\GetAllWorkIncapacitiesRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\FindWorkIncapacityByIdRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\GetWorkIncapacitiesByProjectIdRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\UpdateWorkIncapacityRequest;
use App\Containers\WorkIncapacity\UI\API\Transformers\WorkIncapacityTransformer;

use App\Containers\WorkIncapacity\UI\API\Requests\CreateWorkIncapacityTypeRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\DeleteWorkIncapacityTypeRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\GetAllWorkIncapacityTypesRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\FindWorkIncapacityTypeByIdRequest;
use App\Containers\WorkIncapacity\UI\API\Requests\UpdateWorkIncapacityTypeRequest;
use App\Containers\WorkIncapacity\UI\API\Transformers\WorkIncapacityTypeTransformer;

use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Cartalyst\Stripe\Api\Api;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\WorkIncapacity\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateWorkIncapacityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWorkIncapacity(CreateWorkIncapacityRequest $request)
    {

        try{
            $dataArr = new WorkincapacityTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new WorkincapacityArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $workIncapacities = [];

        foreach ($dataArr as $key => $values) {
            $workIncapacities[] = Apiato::transactionalCall('WorkIncapacity@CreateWorkIncapacityAction', [$values]);

        }
        $result = new Collection($workIncapacities);

        return $this->created($this->transform($result, WorkIncapacityTransformer::class));
    }

    /**
     * @param FindWorkIncapacityByIdRequest $request
     * @return array
     */
    public function findWorkIncapacityById(FindWorkIncapacityByIdRequest $request)
    {
        $workincapacity = Apiato::call('WorkIncapacity@FindWorkIncapacityByIdAction', [$request]);

        return $this->transform($workincapacity, WorkIncapacityTransformer::class);
    }

    /**
     * @param GetAllWorkIncapacitiesRequest $request
     * @return array
     */
    public function getAllWorkIncapacities(GetAllWorkIncapacitiesRequest $request)
    {
        $workIncapacities = Apiato::call('WorkIncapacity@GetAllWorkIncapacitiesAction', [$request]);

        return $this->transform($workIncapacities, WorkIncapacityTransformer::class);
    }

    /**
     * @param UpdateWorkIncapacityRequest $request
     * @return array
     */
    public function updateWorkIncapacity(UpdateWorkIncapacityRequest $request)
    {
        $dataTransporter = new WorkincapacityTransporter(
            array_merge($request->all(), [])
        );

        $workincapacity = Apiato::call('WorkIncapacity@UpdateWorkIncapacityAction', [$dataTransporter]);

        return $this->transform($workincapacity, WorkIncapacityTransformer::class);
    }

    /**
     * @param DeleteWorkIncapacityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWorkIncapacity(DeleteWorkIncapacityRequest $request)
    {
        Apiato::call('WorkIncapacity@DeleteWorkIncapacityAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param \App\Containers\WorkIncapacity\UI\API\Requests\CreateWorkIncapacityTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createWorkIncapacityType(CreateWorkIncapacityTypeRequest $request)
    {
        $workincapacitytype = Apiato::call('WorkIncapacity@CreateWorkIncapacityTypeAction',  [new DataTransporter($request)]);

        return $this->created($this->transform($workincapacitytype, WorkIncapacityTypeTransformer::class));
    }

    /**
     * @param \App\Containers\WorkIncapacity\UI\API\Requests\FindWorkIncapacityTypeByIdRequest $request
     * @return array
     */
    public function findWorkIncapacityTypeById(FindWorkIncapacityTypeByIdRequest $request)
    {
        $workincapacitytype = Apiato::call('WorkIncapacity@FindWorkIncapacityTypeByIdAction', [$request]);

        return $this->transform($workincapacitytype, WorkIncapacityTypeTransformer::class);
    }

    /**
     * @param \App\Containers\WorkIncapacity\UI\API\Requests\GetAllWorkIncapacityTypesRequest $request
     * @return array
     */
    public function getAllWorkIncapacityTypes(GetAllWorkIncapacityTypesRequest $request)
    {
        $workincapacitytypes = Apiato::call('WorkIncapacity@GetAllWorkIncapacityTypesAction', [$request]);

        return $this->transform($workincapacitytypes, WorkIncapacityTypeTransformer::class);
    }

    /**
     * @param \App\Containers\WorkIncapacity\UI\API\Requests\UpdateWorkIncapacityTypeRequest $request
     * @return array
     */
    public function updateWorkIncapacityType(UpdateWorkIncapacityTypeRequest $request)
    {
        $workincapacitytype = Apiato::call('WorkIncapacity@UpdateWorkIncapacityTypeAction', [$request]);

        return $this->transform($workincapacitytype, WorkIncapacityTypeTransformer::class);
    }

    /**
     * @param \App\Containers\WorkIncapacity\UI\API\Requests\DeleteWorkIncapacityTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteWorkIncapacityType(DeleteWorkIncapacityTypeRequest $request)
    {
        Apiato::call('WorkIncapacity@DeleteWorkIncapacityTypeAction', [$request]);

        return $this->noContent();
    }

    public function getWorkIncapacitiesByProjectId(GetWorkIncapacitiesByProjectIdRequest $request)
    {
        $workIncapacities = Apiato::call('WorkIncapacity@GetWorkIncapacitiesByProjectIdAction', [$request]);

        return $this->transform($workIncapacities, WorkIncapacityTransformer::class);
    }
}

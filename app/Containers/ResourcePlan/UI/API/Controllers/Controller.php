<?php

namespace App\Containers\ResourcePlan\UI\API\Controllers;

use App\Containers\ResourcePlan\Data\Transporters\ResourcePlansArrayTransporter;
use App\Containers\ResourcePlan\Data\Transporters\ResourcePlansTransporter;
use App\Containers\ResourcePlan\UI\API\Requests\CreateResourcePlanRequest;
use App\Containers\ResourcePlan\UI\API\Requests\DeleteResourcePlanRequest;
use App\Containers\ResourcePlan\UI\API\Requests\GetAllResourcePlansRequest;
use App\Containers\ResourcePlan\UI\API\Requests\FindResourcePlanByIdRequest;
use App\Containers\ResourcePlan\UI\API\Requests\GetResourcePlanByProjectIdRequest;
use App\Containers\ResourcePlan\UI\API\Requests\UpdateResourcePlanRequest;
use App\Containers\ResourcePlan\UI\API\Transformers\ResourcePlanTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\ResourcePlan\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateResourcePlanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createResourcePlan(CreateResourcePlanRequest $request)
    {
        try{
            $dataArr = new ResourcePlansTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ResourcePlansArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $resourceplan = Apiato::call('ResourcePlan@CreateResourcePlanAction', [$dataArr[0]]);

        $result = new Collection($resourceplan);
        return $this->created($this->transform($result, ResourcePlanTransformer::class));
    }

    /**
     * @param FindResourcePlanByIdRequest $request
     * @return array
     */
    public function findResourcePlanById(FindResourcePlanByIdRequest $request)
    {
        $resourceplan = Apiato::call('ResourcePlan@FindResourcePlanByIdAction', [$request]);

        return $this->transform($resourceplan, ResourcePlanTransformer::class);
    }

    /**
     * @param GetAllResourcePlansRequest $request
     * @return array
     */
    public function getAllResourcePlans(GetAllResourcePlansRequest $request)
    {
        $data = Apiato::call('ResourcePlan@GetAllResourcePlansAction',  [new DataTransporter($request)]);

        //return $this->transform($resourceplans, ResourcePlanTransformer::class);
        return $data;
    }

    /**
     * @param UpdateResourcePlanRequest $request
     * @return array
     */
    public function updateResourcePlan(UpdateResourcePlanRequest $request)
    {
        $resourceplan = Apiato::call('ResourcePlan@UpdateResourcePlanAction', [new ResourcePlansTransporter($request->all())]);

        return $this->transform($resourceplan, ResourcePlanTransformer::class);
    }

    /**
     * @param DeleteResourcePlanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteResourcePlan(DeleteResourcePlanRequest $request)
    {
        Apiato::call('ResourcePlan@DeleteResourcePlanAction', [$request]);

        return $this->noContent();
    }

    public function getResourcePlanByProjectId(GetResourcePlanByProjectIdRequest $request)
    {
        $data = Apiato::call('ResourcePlan@GetResourcePlanByProjectIdAction', [new DataTransporter($request)]);

        return $data;
    }
}

<?php

namespace App\Containers\Schedule\UI\API\Controllers;

use App\Containers\Schedule\Data\Transporters\ScheduleArrayTransporter;
use App\Containers\Schedule\Data\Transporters\ScheduleTransporter;
use App\Containers\Schedule\UI\API\Requests\CreateProjectSchedules;
use App\Containers\Schedule\UI\API\Requests\CreateScheduleRequest;
use App\Containers\Schedule\UI\API\Requests\DeleteScheduleRequest;
use App\Containers\Schedule\UI\API\Requests\GetAllSchedulesRequest;
use App\Containers\Schedule\UI\API\Requests\FindScheduleByIdRequest;
use App\Containers\Schedule\UI\API\Requests\ResourcePlanRequest;
use App\Containers\Schedule\UI\API\Requests\ResourcePlansRequest;
use App\Containers\Schedule\UI\API\Requests\UpdateScheduleRequest;
use App\Containers\Schedule\UI\API\Transformers\ScheduleTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
use App\Ship\Transporters\DataTransporter;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;
/**
 * Class Controller
 *
 * @package App\Containers\Schedule\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateScheduleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSchedule(CreateScheduleRequest $request)
    {
        try{
            $dataArr = new ScheduleTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ScheduleArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $schedules = [];

        foreach ($dataArr as $key => $values) {
            $schedulesArr = Apiato::transactionalCall('Schedule@CreateScheduleAction', [$values]);
            //$schedules[] = $shedulesArr[0];
            foreach($schedulesArr as $sc) {
                $schedules[] = $sc;
            }
        }

        $result = new Collection($schedules);

        return $this->transform($result, ScheduleTransformer::class);

    }

    /**
     * @param FindScheduleByIdRequest $request
     * @return array
     */
    public function findScheduleById(FindScheduleByIdRequest $request)
    {
        $schedule = Apiato::call('Schedule@FindScheduleByIdAction', [$request]);

        return $this->transform($schedule, ScheduleTransformer::class);
    }

    /**
     * @param GetAllSchedulesRequest $request
     * @return array
     */
    public function getAllSchedules(GetAllSchedulesRequest $request)
    {
        $schedules = Apiato::call('Schedule@GetAllSchedulesAction', [new DataTransporter($request)]);

        return $this->transform($schedules, ScheduleTransformer::class);
    }

    /**
     * @param UpdateScheduleRequest $request
     * @return array
     */
    public function updateSchedule(UpdateScheduleRequest $request)
    {
        $schedule = Apiato::call('Schedule@UpdateScheduleAction', [$request]);

        return $this->transform($schedule, ScheduleTransformer::class);
    }

    /**
     * @param DeleteScheduleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSchedule(DeleteScheduleRequest $request)
    {
        Apiato::call('Schedule@DeleteScheduleAction', [$request]);

        return $this->noContent();
    }

    public function getResourcePlans(ResourcePlansRequest $request)
    {
        $data = Apiato::call('Schedule@GetResourcePlansAction', [new DataTransporter($request)]);
        return $data;
    }


    public function getResourcePlan(ResourcePlanRequest $request)
    {
        $data = Apiato::call('Schedule@GetResourcePlanAction', [new DataTransporter($request)]);
        return $data;
    }

    public function createProjectSchedules(CreateScheduleRequest $request)
    {
        try{
            $dataArr = new ScheduleTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new ScheduleArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


        $schedules = [];

        foreach ($dataArr as $key => $values) {
            $schedules[] = Apiato::transactionalCall('Schedule@CreateProjectScheduleAction', [$values]);
        }

        if (empty($schedules[0])) {
            $schedules = [];
        }

        $result = new Collection($schedules);

        return $this->transform($result, ScheduleTransformer::class);
    }
}

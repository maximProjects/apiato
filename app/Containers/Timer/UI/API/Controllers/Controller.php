<?php

namespace App\Containers\Timer\UI\API\Controllers;

use App\Containers\Timer\Data\Transporters\CreateTimerTransporter;
use App\Containers\Timer\UI\API\Requests\CreateTimerRequest;
use App\Containers\Timer\UI\API\Requests\DeleteTimerRequest;
use App\Containers\Timer\UI\API\Requests\GetAllTimersRequest;
use App\Containers\Timer\UI\API\Requests\FindTimerByIdRequest;
use App\Containers\Timer\UI\API\Requests\UpdateTimerRequest;
use App\Containers\Timer\UI\API\Transformers\TimerTransformer;
use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryArrayTransporter;
use App\Containers\TimeRegistry\Data\Transporters\TimeRegistryTransporter;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Stripe\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Timer\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateTimerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTimer(CreateTimerRequest $request)
    {
        try{
            $dataArr = new TimeRegistryTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new TimeRegistryArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $timers = [];
        foreach ($dataArr as $key => $values) {
            $timers[] = Apiato::transactionalCall('Timer@CreateTimerAction', [$values]);
        }

        $result = new Collection($timers);

        return $this->created($this->transform($result, TimerTransformer::class));
    }

    public function startTimer(CreateTimerRequest $request)
    {
        try{
            $dataArr = new TimeRegistryTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new TimeRegistryArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $timers = [];
        foreach ($dataArr as $key => $values) {
            $timers[] = Apiato::transactionalCall('Timer@StartTimerAction', [$values]);
        }

        $result = new \Illuminate\Support\Collection($timers);

        return $this->created($this->transform($result, TimerTransformer::class));
    }

    public function stopTimer(CreateTimerRequest $request)
    {
        $dataTransporter = new CreateTimerTransporter(
        array_merge($request->all(), [])
    );
        $timer = Apiato::transactionalCall('Timer@StopTimerAction', [$dataTransporter]);

        return $this->created($this->transform($timer, TimerTransformer::class));
    }


  public function pauseTimer(CreateTimerRequest $request)
  {
    $dataTransporter = new CreateTimerTransporter(
      array_merge($request->all(), [])
    );
    $timer = Apiato::transactionalCall('Timer@PauseTimerAction', [$dataTransporter]);

    return $this->created($this->transform($timer, TimerTransformer::class));
  }

    /**
     * @param FindTimerByIdRequest $request
     * @return array
     */
    public function findTimerById(FindTimerByIdRequest $request)
    {
        $timer = Apiato::call('Timer@FindTimerByIdAction', [$request]);

        return $this->transform($timer, TimerTransformer::class);
    }

    /**
     * @param GetAllTimersRequest $request
     * @return array
     */
    public function getAllTimers(GetAllTimersRequest $request)
    {
        $timers = Apiato::call('Timer@GetAllTimersAction', [$request]);

        return $this->transform($timers, TimerTransformer::class);
    }

    /**
     * @param UpdateTimerRequest $request
     * @return array
     */
    public function updateTimer(UpdateTimerRequest $request)
    {
        $timer = Apiato::call('Timer@UpdateTimerAction', [$request]);

        return $this->transform($timer, TimerTransformer::class);
    }

    /**
     * @param DeleteTimerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteTimer(DeleteTimerRequest $request)
    {
        Apiato::call('Timer@DeleteTimerAction', [$request]);

        return $this->noContent();
    }
}

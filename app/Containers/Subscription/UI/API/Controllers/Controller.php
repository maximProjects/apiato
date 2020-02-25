<?php

namespace App\Containers\Subscription\UI\API\Controllers;

use App\Containers\Subscription\Data\Transporters\CreateSubscriptionArrayTransporter;
use App\Containers\Subscription\Data\Transporters\CreateSubscriptionTransporter;
use App\Containers\Subscription\Data\Transporters\PlanArrayTransporter;
use App\Containers\Subscription\Data\Transporters\PlanTransporter;
use App\Containers\Subscription\Data\Transporters\SubscriptionsRegisterArrayTransporter;
use App\Containers\Subscription\Data\Transporters\SubscriptionsRegisterTransporter;
use App\Containers\Subscription\Data\Transporters\SubscriptionsUpdatePlanArrayTransporter;
use App\Containers\Subscription\Data\Transporters\SubscriptionsUpdatePlanTransporter;
use App\Containers\Subscription\UI\API\Requests\CreateSubscriptionRequest;
use App\Containers\Subscription\UI\API\Requests\DeleteSubscriptionRequest;
use App\Containers\Subscription\UI\API\Requests\GetAllSubscriptionsRegisterRequest;
use App\Containers\Subscription\UI\API\Requests\GetAllSubscriptionsRequest;
use App\Containers\Subscription\UI\API\Requests\FindSubscriptionByIdRequest;
use App\Containers\Subscription\UI\API\Requests\SubscriptionAttachUsersRequest;
use App\Containers\Subscription\UI\API\Requests\SubscriptionsRegisterRequest;
use App\Containers\Subscription\UI\API\Requests\SubscriptionCreatePlanRequest;
use App\Containers\Subscription\UI\API\Requests\SubscriptionsUpdatePlanRequest;
use App\Containers\Subscription\UI\API\Requests\UpdateSubscriptionRequest;
use App\Containers\Subscription\UI\API\Transformers\SubscriptionsRegisterTransformer;
use App\Containers\Subscription\UI\API\Transformers\SubscriptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Subscription\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSubscriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSubscription(CreateSubscriptionRequest $request)
    {
        try{
            $dataArr = new CreateSubscriptionTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new CreateSubscriptionArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

      $Subscriptions = [];

      foreach ($dataArr as $key => $values) {
        $Subscriptions[] = Apiato::transactionalCall('Subscription@CreateSubscriptionAction', [$values]);

      }
        $result = new Collection($Subscriptions);
        return $this->created($this->transform($result, SubscriptionTransformer::class));
    }

    /**
     * @param FindSubscriptionByIdRequest $request
     * @return array
     */
    public function findSubscriptionById(FindSubscriptionByIdRequest $request)
    {
        $Subscription = Apiato::call('Subscription@FindSubscriptionByIdAction', [$request]);

        return $this->transform($Subscription, SubscriptionTransformer::class);
    }

    /**
     * @param GetAllSubscriptionsRequest $request
     * @return array
     */
    public function getAllSubscriptions(GetAllSubscriptionsRequest $request)
    {
        $Subscriptions = Apiato::call('Subscription@GetAllSubscriptionsAction', [$request]);

        return $this->transform($Subscriptions, SubscriptionTransformer::class);
    }

    /**
     * @param UpdateSubscriptionRequest $request
     * @return array
     */
    public function updateSubscription(UpdateSubscriptionRequest $request)
    {
        $Subscription = Apiato::call('Subscription@UpdateSubscriptionAction', [$request]);

        return $this->transform($Subscription, SubscriptionTransformer::class);
    }

    /**
     * @param DeleteSubscriptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSubscription(DeleteSubscriptionRequest $request)
    {
        Apiato::call('Subscription@DeleteSubscriptionAction', [$request]);

        return $this->noContent();
    }

    public function SubscriptionCreatePlan(SubscriptionCreatePlanRequest $request)
    {

        try{
            $dataArr = new PlanTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new PlanArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $plans = [];

      foreach ($dataArr as $key => $values) {
        $plans[] = Apiato::transactionalCall('Subscription@SubscriptionCreatePlanAction', [$values]);

      }

      return $plans;
    }

    public function SubscriptionAttachUsers(SubscriptionAttachUsersRequest $request)
    {
        try{
            $dataArr = new PlanTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new PlanArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];


      $subscriptions = [];

      foreach ($dataArr as $key => $values) {
        $subscriptions[] = Apiato::transactionalCall('Subscription@SubscriptionAttachUsersAction', [$values]);
      }

       $result = new Collection($subscriptions);

      return $this->transform($result, SubscriptionTransformer::class);
    }

    public function SubscriptionRegister(SubscriptionsRegisterRequest $request) {

        try{
            $dataArr = new SubscriptionsRegisterTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new SubscriptionsRegisterArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $registers = [];

        foreach ($dataArr as $key => $values) {
            $registers[] = Apiato::transactionalCall('Subscription@CreateSubscriptionsRegisterAction', [$values]);

        }
        $result = new Collection($registers);
        return $this->created($this->transform($result, SubscriptionsRegisterTransformer::class));
    }

    public function getAllSubscriptionsRegister(GetAllSubscriptionsRegisterRequest $request)
    {
        $Subscriptions = Apiato::call('Subscription@GetAllSubscriptionsRegisterAction', [$request]);

        return $this->transform($Subscriptions, SubscriptionsRegisterTransformer::class);
    }

    public function subscriptionsUpdatePlan(SubscriptionsUpdatePlanRequest $request)
    {

        $dataTransporter = new SubscriptionsUpdatePlanTransporter(
            array_merge($request->all(), [])
        );

        $plan = Apiato::call('Subscription@SubscriptionUpdatePlanAction', [$dataTransporter]);

        return $plan;
    }
}

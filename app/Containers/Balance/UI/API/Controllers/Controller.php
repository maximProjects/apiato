<?php

namespace App\Containers\Balance\UI\API\Controllers;

use App\Containers\Balance\Data\Transporters\BalanceTransporter;
use App\Containers\Balance\Data\Transporters\MonthlyBalanceArrayTransporter;
use App\Containers\Balance\Data\Transporters\MonthlyBalanceTransporter;
use App\Containers\Balance\Data\Transporters\MonthlyHourArrayTransporter;
use App\Containers\Balance\Data\Transporters\MonthlyHourTransporter;
use App\Containers\Balance\UI\API\Requests\CreateBalanceRequest;
use App\Containers\Balance\UI\API\Requests\CreateMonthlyBalanceRequest;
use App\Containers\Balance\UI\API\Requests\CreateMonthlyHoursRequest;
use App\Containers\Balance\UI\API\Requests\DeleteBalanceRequest;
use App\Containers\Balance\UI\API\Requests\GetAllBalancesRequest;
use App\Containers\Balance\UI\API\Requests\FindBalanceByIdRequest;
use App\Containers\Balance\UI\API\Requests\GetAllMonthlyBalancesRequest;
use App\Containers\Balance\UI\API\Requests\UpdateBalanceRequest;
use App\Containers\Balance\UI\API\Requests\UpdateMonthlyHourRequest;
use App\Containers\Balance\UI\API\Transformers\BalanceTransformer;
use App\Containers\Balance\UI\API\Transformers\MonthlyBalanceTransformer;
use App\Containers\Balance\UI\API\Transformers\MonthlyHoursTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Balance\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBalance(CreateBalanceRequest $request)
    {
        $balance = Apiato::call('Balance@CreateBalanceAction', [$request]);

        return $this->created($this->transform($balance, BalanceTransformer::class));
    }

    /**
     * @param FindBalanceByIdRequest $request
     * @return array
     */
    public function findBalanceById(FindBalanceByIdRequest $request)
    {
        $balance = Apiato::call('Balance@FindBalanceByIdAction', [$request]);

        return $this->transform($balance, BalanceTransformer::class);
    }

    /**
     * @param GetAllBalancesRequest $request
     * @return array
     */
    public function getAllBalances(GetAllBalancesRequest $request)
    {
        $balances = Apiato::call('Balance@GetAllBalancesAction', [$request]);

        return $this->transform($balances, BalanceTransformer::class);
    }

    /**
     * @param UpdateBalanceRequest $request
     * @return array
     */
    public function updateBalance(UpdateBalanceRequest $request)
    {
        $dataTransporter = new BalanceTransporter(
          array_merge($request->all(), [])
        );
        $balance = Apiato::call('Balance@UpdateBalanceAction', [$dataTransporter]);

        return $this->transform($balance, BalanceTransformer::class);
    }

    /**
     * @param DeleteBalanceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBalance(DeleteBalanceRequest $request)
    {
        Apiato::call('Balance@DeleteBalanceAction', [$request]);

        return $this->noContent();
    }

    public function createMonthlyHour(CreateMonthlyHoursRequest $request)
    {
        try{
            $dataArr = new MonthlyHourTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new MonthlyHourArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $monthlyHours = [];

        foreach ($dataArr as $key => $values) {
            $monthlyHours[] = Apiato::transactionalCall('Balance@CreateMonthlyHoursAction', [$values]);

        }
        $result = new Collection($monthlyHours);
        return $this->created($this->transform($result, MonthlyHoursTransformer::class));
    }

    public function updateMonthlyHour(UpdateMonthlyHourRequest $request)
    {
        $dataTransporter = new MonthlyHourTransporter(
            array_merge($request->all(), [])
        );
        $monthlyHour = Apiato::call('Balance@UpdateMonthlyHourAction', [$dataTransporter]);

        return $this->transform($monthlyHour, MonthlyHoursTransformer::class);
    }

    public function createMonthlyBalance(CreateMonthlyBalanceRequest $request)
    {

        try{
            $dataArr = new MonthlyBalanceTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new MonthlyBalanceArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $monthlyBalance = false;

        foreach ($dataArr as $key => $values) {
            $monthlyBalance = Apiato::transactionalCall('Balance@CreateMonthlyBalanceAction', [$values]);

        }
    //    $result = new Collection($monthlyBalance);



        if($monthlyBalance)
        {

            return $this->transform($monthlyBalance, MonthlyBalanceTransformer::class);
        }
        return "Already exist";

    }

    public function updateMonthlyBalance(UpdateMonthlyHourRequest $request)
    {
        $dataTransporter = new MonthlyBalanceTransporter(
            array_merge($request->all(), [])
        );

        $monthlyBalance = Apiato::call('Balance@UpdateMonthlyBalanceAction', [$dataTransporter]);

        return $this->transform($monthlyBalance, MonthlyBalanceTransformer::class);
    }

    public function getAllMonthlyBalances(GetAllMonthlyBalancesRequest $request)
    {

        $balances = Apiato::call('Balance@GetAllMonthlyBalanceAction', [$request]);

        return $this->transform($balances, MonthlyBalanceTransformer::class);
    }
}

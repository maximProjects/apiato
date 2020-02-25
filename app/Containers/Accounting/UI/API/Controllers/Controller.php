<?php

namespace App\Containers\Accounting\UI\API\Controllers;

use App\Containers\Accounting\UI\API\Requests\CreateAccountingRequest;
use App\Containers\Accounting\UI\API\Requests\DeleteAccountingRequest;
use App\Containers\Accounting\UI\API\Requests\GetAllAccountingsRequest;
use App\Containers\Accounting\UI\API\Requests\FindAccountingByIdRequest;
use App\Containers\Accounting\UI\API\Requests\UpdateAccountingRequest;
use App\Containers\Accounting\UI\API\Transformers\AccountingTransformer;
use App\Containers\TimeRegistry\UI\API\Transformers\TimeRegistryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

/**
 * Class Controller
 *
 * @package App\Containers\Accounting\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAccountingRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAccounting(CreateAccountingRequest $request)
    {
        $accounting = Apiato::call('Accounting@CreateAccountingAction', [$request]);

        return $this->created($this->transform($accounting, AccountingTransformer::class));
    }

    /**
     * @param FindAccountingByIdRequest $request
     * @return array
     */
    public function findAccountingById(FindAccountingByIdRequest $request)
    {
        $accounting = Apiato::call('Accounting@FindAccountingByIdAction', [$request]);

        return $this->transform($accounting, AccountingTransformer::class);
    }

    /**
     * @param GetAllAccountingsRequest $request
     * @return array
     */
    public function getAllAccountings(GetAllAccountingsRequest $request)
    {
        $accountings = Apiato::call('Accounting@GetAllAccountingsAction', [new DataTransporter($request)]);

        return $this->transform($accountings, TimeRegistryTransformer::class);
    }

    /**
     * @param UpdateAccountingRequest $request
     * @return array
     */
    public function updateAccounting(UpdateAccountingRequest $request)
    {
        $accounting = Apiato::call('Accounting@UpdateAccountingAction', [$request]);

        return $this->transform($accounting, AccountingTransformer::class);
    }

    /**
     * @param DeleteAccountingRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAccounting(DeleteAccountingRequest $request)
    {
        Apiato::call('Accounting@DeleteAccountingAction', [$request]);

        return $this->noContent();
    }
}

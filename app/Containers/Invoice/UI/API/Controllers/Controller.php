<?php

namespace App\Containers\Invoice\UI\API\Controllers;

use App\Containers\Invoice\Data\Transporters\InvoiceArrayTransporter;
use App\Containers\Invoice\Data\Transporters\InvoiceTransporter;
use App\Containers\Invoice\UI\API\Requests\CreateInvoiceRequest;
use App\Containers\Invoice\UI\API\Requests\DeleteInvoiceRequest;
use App\Containers\Invoice\UI\API\Requests\GetAllInvoicesRequest;
use App\Containers\Invoice\UI\API\Requests\FindInvoiceByIdRequest;
use App\Containers\Invoice\UI\API\Requests\GetInvoicesByProjectIdRequest;
use App\Containers\Invoice\UI\API\Requests\UpdateInvoiceRequest;
use App\Containers\Invoice\UI\API\Transformers\InvoiceTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\InvalidDataTypeException;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Controller
 *
 * @package App\Containers\Invoice\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createInvoice(CreateInvoiceRequest $request)
    {
        try{
            $dataArr = new InvoiceTransporter(
                array_merge($request->all(), [])
            );
        }catch (InvalidDataTypeException $e){

            $dataArr = new InvoiceArrayTransporter(
                array_merge($request->all(), [])
            );
        }

        $dataArr = $dataArr->toArray();

        if(!array_key_exists(0, $dataArr))
            $dataArr = [$dataArr];

        $invoices = [];

        foreach ($dataArr as $key => $values) {
            $invoices[] = Apiato::transactionalCall('Invoice@CreateInvoiceAction', [$values, $request->file()]);

        }
        $result = new Collection($invoices);

        return $this->created($this->transform(@$result, InvoiceTransformer::class));
    }

    /**
     * @param FindInvoiceByIdRequest $request
     * @return array
     */
    public function findInvoiceById(FindInvoiceByIdRequest $request)
    {
        $invoice = Apiato::call('Invoice@FindInvoiceByIdAction', [$request]);

        return $this->transform($invoice, InvoiceTransformer::class);
    }

    /**
     * @param GetAllInvoicesRequest $request
     * @return array
     */
    public function getAllInvoices(GetAllInvoicesRequest $request)
    {
        $invoices = Apiato::call('Invoice@GetAllInvoicesAction', [$request]);

        return $this->transform($invoices, InvoiceTransformer::class);
    }

    public function getInvoicesByProjectId(GetInvoicesByProjectIdRequest $request)
    {
        $invoices = Apiato::call('Invoice@GetInvoicesByProjectIdAction', [$request]);

        return $this->transform($invoices, InvoiceTransformer::class);
    }
    /**
     * @param UpdateInvoiceRequest $request
     * @return array
     */
    public function updateInvoice(UpdateInvoiceRequest $request)
    {
        $dataTransporter = new InvoiceTransporter(
            array_merge($request->all(), [])
        );
        $invoice = Apiato::transactionalCall('Invoice@UpdateInvoiceAction', [$dataTransporter]);

        return $this->transform($invoice, InvoiceTransformer::class);
    }

    /**
     * @param DeleteInvoiceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteInvoice(DeleteInvoiceRequest $request)
    {
        Apiato::call('Invoice@DeleteInvoiceAction', [$request]);

        return $this->noContent();
    }
}

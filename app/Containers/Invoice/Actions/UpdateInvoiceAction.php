<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateInvoiceAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $invoice = Apiato::call('Invoice@UpdateInvoiceTask', [$request->id, $data]);

        return $invoice;
    }
}

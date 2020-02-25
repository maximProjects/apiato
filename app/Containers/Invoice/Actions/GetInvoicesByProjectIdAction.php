<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetInvoicesByProjectIdAction extends Action
{
    public function run(Request $request)
    {
        $invoice = Apiato::call('Invoice@GetInvoicesByProjectIdTask', [$request->id]);

        return $invoice;
    }
}

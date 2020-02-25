<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindInvoiceByIdAction extends Action
{
    public function run(Request $request)
    {
        $invoice = Apiato::call('Invoice@FindInvoiceByIdTask', [$request->id]);

        return $invoice;
    }
}

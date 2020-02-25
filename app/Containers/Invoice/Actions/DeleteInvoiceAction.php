<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteInvoiceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Invoice@DeleteInvoiceTask', [$request->id]);
    }
}

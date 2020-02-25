<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllInvoicesAction extends Action
{
    public function run(Request $request)
    {
        $invoices = Apiato::call('Invoice@GetAllInvoicesTask', [], ['addRequestCriteria']);

        return $invoices;
    }
}

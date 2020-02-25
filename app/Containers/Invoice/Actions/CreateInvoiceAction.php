<?php

namespace App\Containers\Invoice\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateInvoiceAction extends Action
{
    public function run(array $data, $files)
    {
        $invoice = Apiato::call('Invoice@CreateInvoiceTask', [$data]);

        if($files)
        {
            Apiato::call('Invoice@UpdateInvoiceAttachmentsTask', [$invoice->id, $files]);
        }

        return $invoice;
    }
}

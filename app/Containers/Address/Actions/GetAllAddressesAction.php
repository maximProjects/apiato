<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAddressesAction extends Action
{
    public function run(Request $request)
    {
        $addresses = Apiato::call('Address@GetAllAddressesTask', [], ['addRequestCriteria']);

        return $addresses;
    }
}

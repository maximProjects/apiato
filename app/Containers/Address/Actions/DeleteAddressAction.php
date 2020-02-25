<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteAddressAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Address@DeleteAddressTask', [$request->id]);
    }
}

<?php

namespace App\Containers\Address\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindAddressByIdAction extends Action
{
    public function run(Request $request)
    {
        $address = Apiato::call('Address@FindAddressByIdTask', [$request->id]);

        return $address;
    }
}

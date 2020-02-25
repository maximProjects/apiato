<?php

namespace App\Containers\Balance\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteBalanceAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Balance@DeleteBalanceTask', [$request->id]);
    }
}

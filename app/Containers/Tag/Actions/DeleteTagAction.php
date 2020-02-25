<?php

namespace App\Containers\Tag\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteTagAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Tag@DeleteTagTask', [$request->id]);
    }
}

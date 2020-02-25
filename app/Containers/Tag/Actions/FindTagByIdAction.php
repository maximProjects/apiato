<?php

namespace App\Containers\Tag\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindTagByIdAction extends Action
{
    public function run(Request $request)
    {
        $tag = Apiato::call('Tag@FindTagByIdTask', [$request->id]);

        return $tag;
    }
}

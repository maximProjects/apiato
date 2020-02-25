<?php

namespace App\Containers\Tag\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllTagsAction extends Action
{
    public function run(Request $request)
    {
        $tags = Apiato::call('Tag@GetAllTagsTask', [], ['addRequestCriteria']);

        return $tags;
    }
}

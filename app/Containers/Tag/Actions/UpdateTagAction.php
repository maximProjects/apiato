<?php

namespace App\Containers\Tag\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateTagAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $tag = Apiato::call('Tag@UpdateTagTask', [$request->id, $data]);

        return $tag;
    }
}

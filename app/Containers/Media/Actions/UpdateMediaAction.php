<?php

namespace App\Containers\Media\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMediaAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $media = Apiato::call('Media@UpdateMediaTask', [$request->id, $data]);

        return $media;
    }
}

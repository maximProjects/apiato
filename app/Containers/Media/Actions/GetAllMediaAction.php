<?php

namespace App\Containers\Media\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllMediaAction extends Action
{
    public function run(Request $request)
    {
        $media = Apiato::call('Media@GetAllMediaTask', [], ['addRequestCriteria']);

        return $media;
    }
}

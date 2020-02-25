<?php

namespace App\Containers\Photo\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPhotosAction extends Action
{
    public function run(Request $request)
    {
        $photos = Apiato::call('Photo@GetAllPhotosTask', [], ['addRequestCriteria']);

        return $photos;
    }
}

<?php

namespace App\Containers\Media\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateMediaAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->file();

        Apiato::call('Media@UploadMediaTask', [$data]);

        $media = Apiato::call('Media@CreateMediaTask', [$data]);

        return $media;

    }
}

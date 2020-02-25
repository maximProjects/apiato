<?php

namespace App\Containers\Deviation\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDeviationAttachmentsAction extends Action
{
    public function run($id, array $files = [])
    {
        $deviation = Apiato::call('Deviation@FindDeviationByIdTask', [$id]);
        if($files)
        {
            $media = Apiato::call('Deviation@CreateDeviationAttachmentsTask', [$deviation->id, $files]);
        }

        return $media;
    }
}

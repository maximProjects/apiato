<?php

namespace App\Containers\TimeRegistry\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateTimeRegistryAttachmentAction extends Action
{
    public function run($id, array $files = [])
    {
        $timeregistry = Apiato::call('TimeRegistry@FindTimeRegistryByIdTask', [$id]);

        $media = Apiato::call('TimeRegistry@CreateTimeRegistryAttachmentTask', [$timeregistry->id, $files]);

        return $media;
    }
}

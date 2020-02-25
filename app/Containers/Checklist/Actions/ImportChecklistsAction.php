<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class ImportChecklistsAction extends Action
{
    public function run($files)
    {
        $checklist = Apiato::call('Checklist@ImportChecklistsTask', [$files]);

        return $checklist;
    }
}

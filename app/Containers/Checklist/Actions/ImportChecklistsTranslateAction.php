<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class ImportChecklistsTranslateAction extends Action
{
    public function run($files)
    {
        $checklist = Apiato::call('Checklist@ImportChecklistsTranslateTask', [$files]);

        return $checklist;
    }
}

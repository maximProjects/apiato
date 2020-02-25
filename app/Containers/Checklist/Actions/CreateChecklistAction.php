<?php

namespace App\Containers\Checklist\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateChecklistAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $checklist = Apiato::call('Checklist@CreateChecklistTask', [$data]);


        if(isset($data['comments']) && count($data['comments']) > 0)
        {
            Apiato::call('Checklist@UpdateChecklistCommentsTask', [$checklist->id, $data['comments']]);
        }

        return $checklist;
    }
}

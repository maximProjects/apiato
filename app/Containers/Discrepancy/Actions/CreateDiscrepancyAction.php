<?php

namespace App\Containers\Discrepancy\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateDiscrepancyAction extends Action
{
    public function run(array $data)
    {

        $discrepancy = Apiato::call('Discrepancy@CreateDiscrepancyTask', [$data]);

        return $discrepancy;
    }
}

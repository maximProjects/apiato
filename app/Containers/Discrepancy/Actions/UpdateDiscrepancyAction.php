<?php

namespace App\Containers\Discrepancy\Actions;

use App\Containers\Discrepancy\Data\Transporters\DiscrepancyTransporter;
use App\Containers\Discrepancy\Models\Discrepancy;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class UpdateDiscrepancyAction extends Action
{
    public function run(DiscrepancyTransporter $data): Discrepancy
    {

        $discrepancy = Apiato::call('Discrepancy@UpdateDiscrepancyTask', [$data->id, $data->toArray()]);

        return $discrepancy;
    }
}

<?php

namespace App\Containers\Profile\Actions;

use App\Containers\Profile\Data\Transporters\ProfileTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateProfileAction extends Action
{
    public function run(ProfileTransporter $data)
    {

        $profile = Apiato::call('Profile@UpdateProfileTask', [$data->id, $data->toArray()]);

        return $profile;
    }
}

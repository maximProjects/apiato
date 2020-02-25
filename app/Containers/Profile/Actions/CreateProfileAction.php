<?php

namespace App\Containers\Profile\Actions;

use App\Containers\Profile\Models\Profile;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateProfileAction extends Action
{
    public function run(array $data)
    {
        $profile = Apiato::call('Profile@CreateProfileTask', [$data]);

        return $profile;
    }
}

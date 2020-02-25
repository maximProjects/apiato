<?php

namespace App\Containers\Manager\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateManagerAction extends Action
{
    public function run(DataTransporter $data)
    {
        $data = $data->sanitizeInput([
            "email",
            "password",
            "name",
            "gender",
            "birth"
        ]);

        //Creating User before we create Manager to keep consistency
        $user = Apiato::call('User@GetOrCreateUserByCredentialsTask', [$data]);

        $manager = Apiato::call('Manager@CreateManagerTask', [array('user_id' => $user->id)]);

        return $manager;
    }
}

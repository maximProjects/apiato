<?php

namespace App\Containers\Message\Actions;

use App\Containers\Message\Data\Transporters\MessageTransporter;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateMessageAction extends Action
{
    public function run(MessageTransporter $data)
    {

        $message = Apiato::call('Message@UpdateMessageTask', [$data->id, $data->toArray()]);

        return $message;
    }
}

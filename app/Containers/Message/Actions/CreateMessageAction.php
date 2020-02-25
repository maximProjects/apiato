<?php

namespace App\Containers\Message\Actions;

use App\Containers\Message\Models\Message;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;

class CreateMessageAction extends Action
{
    public function run(array $data, array $files = [])
    {

        $message = Apiato::call('Message@CreateMessageTask', [$data]);

        if(isset($data['comments']) && count($data['comments']) > 0)
        {
            Apiato::call('Message@UpdateMessageCommentsTask', [$message->id, $data['comments']]);
        }

        return $message;
    }
}

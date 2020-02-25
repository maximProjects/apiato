<?php

namespace App\Containers\Message\Tasks;

use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Containers\Message\Mails\MessageSendMail;
use App\Containers\Message\Models\Message;
use App\Containers\Message\Models\MessageState;
use App\Containers\User\Mails\UserRegisteredMail;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Mail;

class  UpdateMessageTask extends Task
{

    protected $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            $message = \App\Containers\Message\Models\Message::find($id);

            if(!isset($data['state_id'])) {


                if($message) {
                    if($message->state_id == 0) {

                        $data['state_id'] = MessageState::New;
                    }
                }
            }
            $upd = $this->repository->update($data, $id);

            if($upd->state_id == MessageState::New) {
               // Mail::send(new MessageSendMail($upd));
            }

            return $upd;
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Message\Tasks;

use App\Containers\Message\Data\Repositories\MessageRepository;
use App\Containers\Message\Models\Message;
use App\Containers\Message\Models\MessageState;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateMessageTask extends Task
{

    protected $repository;

    public function __construct(MessageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            $message = null;
            if(isset($data['state_id']) && $data['state_id'] == 0) {
                $user = Auth::user();
                $message = \App\Containers\Message\Models\Message::where([['state_id', '=', MessageState::Draft], ['created_by', '=', $user->id]])->first();
                $is_template = 1;
                if($message) {
                    $message->update($data);
                }
                if(!$message) {
                    //die('create draft');
                    $message = $this->repository->create($data);
                }
            } else {
                //die('create normal');
                $message = $this->repository->create($data);

            }

            if(isset($data['recipients'])&&count($data['recipients']) > 0) {
                foreach ($data['recipients'] as $recepient) {
                    $message->recipients()->attach($recepient, ['type' => Message::MESSAGE_USER_TYPE_RECIPIENT]);
                }
            }

            if(isset($data['media'])&&count($data['media'])>0) {
                foreach ($data['media'] as $file) {
                    $message->media()->attach($file, ['type_id' => Message::MESSAGE_ATTACHMENT_TYPE_ALL]);
                }
            }

            return $message;
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}

<?php

namespace App\Containers\Message\Mails;

use App\Containers\Message\Models\Message;
use App\Containers\User\Models\User;
use App\Ship\Parents\Mails\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageSendMail extends Mail implements ShouldQueue
{
    use Queueable;

    /**
     * @var  \App\Containers\User\Models\User
     */
    protected $message;

    /**
     * UserRegisteredNotification constructor.
     *
     * @param \App\Containers\User\Models\User $user
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('message::message-send')
            ->to($this->message->to->email, $this->message->to->name)
            ->with([
                'name' => $this->message->to->name,
                'content' => $this->message->content,
            ]);
    }
}

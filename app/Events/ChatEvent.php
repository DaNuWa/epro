<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public $message, public $sender_id, public $reciever_id)
    {
    }

    public function broadcastOn()
    {
        if ($this->sender_id > $this->reciever_id) {
            $channel = 'chat.'.$this->sender_id.'.'.$this->reciever_id;
        } else {
            $channel = 'chat.'.$this->reciever_id.'.'.$this->sender_id;
        }

        return new Channel($channel);
    }
}

<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Chat
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function     __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('public_channel');
    }

    /**
     * 指定广播数据。
     *
     * @return array
     */
    public function broadcastWith()
    {
        // 返回当前时间
        return ['name' => 'public_channel_'.Carbon::now()->toDateTimeString()];
    }
}

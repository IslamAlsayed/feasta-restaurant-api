<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    private $orderId;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        // return [new Channel('chat.message.1')];
        return [new Channel('chat.message.' . $this->orderId)];
        // return [new PrivateChannel('chat.message.1')];
        // return [new PrivateChannel('chat.message.' . $this->order->id)];
    }

    public function broadcastWith(): array
    {
        return ['status' => 200, 'result' => 'Your order has been completed.'];
    }

    public function broadcastAs()
    {
        return 'SendMessageChat';
    }
}

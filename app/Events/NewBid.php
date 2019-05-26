<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewBid implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $item_id;
    public $currentTotal;
    public $timestamp;
    public $highBidder;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($item_id, $currentTotal, $timestamp, $highBidder)
    {
        $this->item_id      = $item_id;
        $this->currentTotal = $currentTotal;
        $this->timestamp    = $timestamp;
        $this->highBidder   = $highBidder;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return ['NewBid'];
    }
}

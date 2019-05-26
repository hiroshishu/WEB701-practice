<?php

namespace App\Listeners;

use App\Events\NewBid;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewBidNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewBid  $event
     * @return void
     */
    public function handle(NewBid $event)
    {
        //
        return 'sdfasdfsd';
    }
}

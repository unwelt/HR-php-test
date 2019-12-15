<?php

namespace App\Listeners;

use App\Events\OrderReadyEvent;
use App\Notifications\OrderReadyNotification;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class OrderReadyListener
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
     * @param  OrderReadyEvent  $event
     *
     * @return void
     */
    public function handle(OrderReadyEvent $event)
    {
        if ($event->order->status->alias === 'ready') {
            $partner = $event->order->partner;
            $vendors = $event->order->products->map(function ($item) {
                return $item->vendor;
            });

            Notification::send($partner, new OrderReadyNotification($event->order));
            Notification::send($vendors, new OrderReadyNotification($event->order));
        }
    }
}

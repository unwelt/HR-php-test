<?php

namespace App\Models;

use App\Events\OrderReadyEvent;
use App\Notifications\OrderReadyNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $fillable = [
        'client_email',
        'status_id',
        'partner_id',
    ];

    protected $dispatchesEvents = [
        'saved' => OrderReadyEvent::class
    ];

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_products')
            ->withPivot('quantity', 'price');
    }

    public function getSumAttribute()
    {
        return $this->products->sum(function ($product) {
            return ($product->pivot->quantity * $product->pivot->price);
        });
    }
}

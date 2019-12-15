<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use Notifiable;

    protected $fillable = [];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
}

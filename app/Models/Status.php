<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [];

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function scopeNew($query)
    {
        return $query->where('alias', '=', 'new');
    }

    public function scopeAccepted($query)
    {
        return $query->where('alias', '=', 'accepted');
    }

    public function scopeReady($query)
    {
        return $query->where('alias', '=', 'ready');
    }
}

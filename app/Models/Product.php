<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order','order_products');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items() {
        // hasMany je 1:M
        // M : M
        return $this->belongsToMany(Product::class, 'order_items', 'narudzba_id', 'artikl_id');
    }
}

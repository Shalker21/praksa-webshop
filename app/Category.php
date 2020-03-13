<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['naziv', 'level', 'main_category_id'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}

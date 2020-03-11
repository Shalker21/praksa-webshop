<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['naziv', 'opis_artikla', 'cijena','velicina', 'akcijska_cijena', 'level','category_id', 'path_slika'];

    public function category() {
        $this->belongsTo(Category::class);
    }
}

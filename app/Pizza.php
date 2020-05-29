<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable = [
        'name', 'ingredients', 'priceS', 'priceL', 'priceXL',
    ];
}

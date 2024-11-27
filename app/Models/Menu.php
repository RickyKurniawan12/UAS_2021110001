<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Menu.php
    protected $fillable = [
        'name',
        'description',
        'price',
        'image'
    ];

public function orders()
{
    return $this->hasMany(Order::class);
}
}

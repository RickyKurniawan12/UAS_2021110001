<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'status',
        'price',
        'total_orders',
        'image'
    ];
    
    public function menu()
{
    return $this->belongsTo(Menu::class);
}

}

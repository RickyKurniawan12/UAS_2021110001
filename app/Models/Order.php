<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status',
        'price',
        'total_order',
        'image'
    ];
    
    public function menu()
{
    return $this->belongsTo(Menu::class);
}

}

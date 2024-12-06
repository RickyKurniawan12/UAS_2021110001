<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = ['order_id', 'menu_id', 'quantity', 'subtotal'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

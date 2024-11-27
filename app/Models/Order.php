<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'Status',
        'price',
        'image'
    ];
    public function menu()
{
    return $this->belongsTo(Menu::class);
}

}

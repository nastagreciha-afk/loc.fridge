<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FridgeProduct extends Model
{
    protected $fillable = [
        'fridge_id',
        'product_id',
        'quantity',
        'arrived',
        'expires_at',
    ];
    protected $casts = [
        'arrived' => 'datetime',
        'expires_at' => 'datetime',
    ];
    public function fridge()
    {
        return $this->belongsTo(Fridge::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

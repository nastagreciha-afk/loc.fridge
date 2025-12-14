<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fridge extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fridgeProducts()
    {
        return $this->hasMany(FridgeProduct::class);
    }

}

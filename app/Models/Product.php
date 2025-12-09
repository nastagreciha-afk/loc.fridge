<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'quantity', 'unit', 'expires_at','arrived','fridge_id'];

    protected $dates = ['expires_at','arrived'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function fridge()
    {
        return $this->belongsTo(Fridge::class);
    }

    public function scopeExpired($query) {
        return $query->whereDate('expires_at', '<', 'arrived');
    }

    public function daysLeft()
    {
        return $this->expires_at
            ? now()->diffInDays($this->expires_at, false)
            : null;
    }
}

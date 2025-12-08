<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'quantity', 'unit', 'expires_at','arrived'];

    protected $dates = ['expires_at'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeExpired($query) {
        return $query->whereDate('expires_at', '<', 'arrived');
    }
}

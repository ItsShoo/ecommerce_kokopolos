<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'price', 'category_id', 'stock', 'image_url','featured'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(orderItem::class);
    }
}

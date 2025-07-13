<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}

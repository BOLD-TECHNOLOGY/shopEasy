<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'slug',
        'description',
        'price',
        'sale_price',
        'on_sale',
        'stock',
        'sku',
        'thumbnail',
        'images',
        'color',
        'size',
        'category',
        'tags',
        'meta_title',
        'meta_description',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'on_sale' => 'boolean',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'images' => 'array', // casts JSON to array
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    // Relationships
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    // Check if a product is favorited by a specific user
    public function isFavoritedBy(User $user)
    {
        return $this->favoritedByUsers()->where('user_id', $user->id)->exists();
    }
}
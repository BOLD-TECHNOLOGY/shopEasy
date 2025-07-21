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
        'in_stock',        
        'sku',
        'thumbnail',
        'images',
        'color',
        'size',
        'category',
        'category_id',    
        'brand_id',        
        'tags',
        'specifications', 
        'meta_title',
        'meta_description',
        'is_active',
        'is_featured',
    ];

     protected $casts = [
        'on_sale' => 'boolean',
        'in_stock' => 'boolean', 
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'images' => 'array',
        'specifications' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

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

    public function isFavoritedBy(User $user)
    {
        return $this->favoritedByUsers()->where('user_id', $user->id)->exists();
    }
}
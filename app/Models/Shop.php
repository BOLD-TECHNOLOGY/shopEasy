<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'category',
        'description',
        'logo',
        'banner',
        'email',
        'phone',
        'country',
        'state',
        'city',
        'address',
        'zip_code',
        'website',
        'business_type',
        'tax_id',
        'is_verified',
        'status',
        'rating',
        'followers_count',
        'products_count',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'rating' => 'float',
        'followers_count' => 'integer',
        'products_count' => 'integer',
    ];

    // Relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

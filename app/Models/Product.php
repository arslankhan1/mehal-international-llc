<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'brand_id',
        'name',
        'slug',
        'description',
        'features',
        'price',
        'original_price',
        'sku',
        'stock',
        'status',
        'is_featured',
        'sort_order',
        'meta_data'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'meta_data' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order');
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->where('image_type', 'main')->orderBy('sort_order');
    }

    public function galleryImages()
    {
        return $this->hasMany(ProductImage::class)->where('image_type', 'gallery')->orderBy('sort_order');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function getMainImageAttribute()
    {
        $mainImg = $this->images()->where('image_type', 'main')->first();
        return $mainImg ? asset('storage/' . $mainImg->image_path) : asset('assets/products/default.jpg');
    }

    public function getIsSoldOutAttribute()
    {
        return $this->status === 'sold_out' || $this->stock <= 0;
    }
}

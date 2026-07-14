<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'subcategory',
        'name',
        'slug',
        'price',
        'allow_frame_only',
        'frame_only_price',
        'description',
        'image',
        'specs',
        'features',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'specs' => 'array',
        'features' => 'array',
        'allow_frame_only' => 'boolean',
    ];

    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the stocks/variants for the product.
     */
    public function stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

    /**
     * Get the total stock quantity across all variants.
     */
    public function getTotalStockAttribute()
    {
        return $this->stocks()->sum('qty');
    }
}

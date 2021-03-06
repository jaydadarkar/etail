<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductRating;
use App\Models\ProductQuestion;
use App\Models\OrderProduct;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_sku', 'product_slug', 'product_brand', 'product_category', 'product_variation',
        'product_short_desc', 'product_long_desc', 'product_type', 'product_link',
        'product_mrp', 'product_price', 'product_quantity', 'product_primary_image',
        'product_other_images', 'product_meta_keywords', 'product_meta_desc', 'product_featured', 'product_published',
        'product_tags', 'product_dimensions', 'created_at', 'updated_at'
    ];

    // Relations

    public function questions()
    {
        return $this->hasMany(\App\Models\ProductQuestion::class, 'product_id', 'id');
    }

    public function rating()
    {
        return $this->hasMany(\App\Models\ProductRating::class, 'product_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(\App\Models\OrderProduct::class, 'product_id', 'id');
    }

    public function variations()
    {
        return $this->hasMany(\App\Models\Product::class, 'product_sku', 'product_sku')->where('product_type','simple');
    }

    // Accessors And Mutators
    public function getProductOtherImagesAttribute($value)
    {
        return unserialize($value);
    }

    public function getProductCategoryAttribute($value)
    {
        return explode(',', $value);
    }

    public function getProductVariationAttribute($value)
    {
        return unserialize($value);
    }

    public function setProductOtherImagesAttribute($value)
    {
        $this->attributes['product_other_images'] = serialize($value);
    }

    public function setProductCategoryAttribute($value)
    {
        $this->attributes['product_category'] = implode($value);
    }

    public function setProductVariationAttribute($value)
    {
        $this->attributes['product_variation'] = serialize($value);
    }

    public function setProductSlugAttribute($value)
    {
        $this->attributes['product_slug'] = Str::of($value)->slug('-');
    }
}

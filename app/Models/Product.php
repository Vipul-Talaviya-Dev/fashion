<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use Notifiable;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'price',
        'max_price',
        'discount',
        'weight',
        'thumb_image',
        'small_image',
        'description',
        'short_description',
        'highlights',
        'status',
        'meta_keyword',
        'meta_description',
        'cod', // Cash on Delivery
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->whereStatus(self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->whereStatus(self::INACTIVE);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class,'product_size')->withPivot(['price', 'qty']);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'color_product')->withPivot(['price', 'qty']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function variations()
    {
        return $this->hasMany(Variation::class);
    }
}

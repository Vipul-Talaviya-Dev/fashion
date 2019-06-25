<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    protected $fillable = [
        'product_id',
        'product_type_id',
        'color_id',
        'size_id',
        'images',
        'price',
        'purchase_price',
        'qty',
    ];

     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Mutators
     */


    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }
    
    public function getPriceAttribute($value)
    {
        return $value / 100;
    }

    public function setPurchasePriceAttribute($value)
    {
        $this->attributes['purchase_price'] = $value * 100;
    }
    
    public function getPurchasePriceAttribute($value)
    {
        return $value / 100;
    }
    
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

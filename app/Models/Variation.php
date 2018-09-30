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
        'color_id',
        'size_id',
        'price',
        'qty',
    ];

     protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

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

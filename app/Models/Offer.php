<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
        'name',
        'offer_code',
        'discount',
        'amount',
        'amount_limit',
        'use_time',
        'start_date',
        'end_date',
        'status'
    ];

    protected $dates = ['deleted_at'];

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

    /**
     * Mutators
     */


    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }
    
    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

}

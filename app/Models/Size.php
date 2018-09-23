<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
        'name','status',
    ];

    /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->where('sizes.status', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('sizes.status', self::INACTIVE);
    }
}

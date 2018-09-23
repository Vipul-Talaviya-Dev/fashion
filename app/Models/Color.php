<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
        'name','code','status',
    ];

    /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->where('colors.status', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('colors.status', self::INACTIVE);
    }
}

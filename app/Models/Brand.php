<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Brand extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = ['name', 'image', 'status'];

    /**
     * scope
     */

    public function scopeActive($query)
    {
        return $query->where('brands.status', self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        return $query->where('brands.status', self::INACTIVE);
    }
}

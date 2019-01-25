<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WindowImage extends Model
{
    const ACTIVE = 1, INACTIVE = 2;
    use SoftDeletes;
    use Eloquence;
    protected $fillable = [
    	'title',
    	'link',
    	'image',
    	'description',
        'order',
    	'status',
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

}

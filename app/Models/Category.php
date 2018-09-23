<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Category extends Model
{
	const ACTIVE = 1, INACTIVE = 2;

	use SoftDeletes;
	use Eloquence;

	protected $fillable = [
		'parent_id',
		'name',
		'slug',
		'status',
	];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
	public function scopeActive($query)
	{
		return $query->where('categories.status', self::ACTIVE);
	}

	public function scopeInActive($query)
	{
		return $query->where('categories.status', self::INACTIVE);
	}

	public function parent()
	{
		return $this->belongsTo(Category::class, 'parent_id');
	}

	public static function parents()
	{
		return self::where('parent_id', null);
	}
}

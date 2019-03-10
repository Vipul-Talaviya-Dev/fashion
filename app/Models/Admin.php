<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;

class Admin extends Model
{
	use SoftDeletes;
	use Eloquence;

	const ADMIN = 1, SUBADMIN = 2;

	protected $fillable = [
		'name',
		'role',
		'modules_id',
		'email',
		'password'
	];

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}

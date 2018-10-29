<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
	use Eloquence;

	protected $fillable = [
		'user_id',
		'voucher_id',
		'offer_id',
		'payment_mode',
		'payment_status',
		'payment_reference',
		'cart_amount',
		'discount',
		'extra_discount',
		'total',
		'status'
	];

	/**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
	protected $dates = ['deleted_at'];


	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

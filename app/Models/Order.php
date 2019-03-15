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
		'address_id',
		'offer_id',
		'payment_mode',
		'payment_status',
		'payment_reference',
		'cart_amount',
		'discount',
		'extra_discount',
		'total',
		'payment_response',
		'status'
	];

	/**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
	protected $dates = ['deleted_at'];

	public function orderId()
	{
		return 'FHN'.date('Ymd', strtotime($this->created_at)).$this->id;
	}

	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}

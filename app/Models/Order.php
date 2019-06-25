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
		'discount_amount',
		'extra_discount',
		'total',
		'payment_response',
		'delivery_charge',
		'status',
	];

	/**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
	protected $dates = ['deleted_at'];

	public function orderId()
	{
		return 'SHRD'.date('Ymd', strtotime($this->created_at)).$this->id;
	}

	/**
     * Mutators
     */


    public function setCartAmountAttribute($value)
    {
        $this->attributes['cart_amount'] = $value * 100;
    }
    
    public function getCartAmountAttribute($value)
    {
        return $value / 100;
    }


    public function setDiscountAmountAttribute($value)
    {
        $this->attributes['discount_amount'] = $value * 100;
    }
    
    public function getDiscountAmountAttribute($value)
    {
        return $value / 100;
    }

    public function setDeliveryChargeAttribute($value)
    {
        $this->attributes['delivery_charge'] = $value * 100;
    }
    
    public function getDeliveryChargeAttribute($value)
    {
        return $value / 100;
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = $value * 100;
    }
    
    public function getTotalAttribute($value)
    {
        return $value / 100;
    }

	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function address()
	{
		return $this->belongsTo(Address::class);
	}
}

<?php

namespace App\Models;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{

	use SoftDeletes;
	use Eloquence;

	protected $fillable = [
		'order_id',
		'user_id',
		'product_id',
		'variation_id',
		'price',
		'max_price',
		'qty',
		'status',
		'message',
		'return_reason',
	];

	/**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
	protected $dates = ['deleted_at'];
	
	public function orderProductId()
	{
		return 'SHRDSO'.date('Ymd', strtotime($this->created_at)).$this->id;
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}	

	public function variation()
    {
        return $this->belongsTo(Variation::class);
    }

	public function user()
	{
		return $this->belongsTo(User::class);
	}		    
}

<?php

namespace Delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
	use TransformableTrait;

	protected $fillable =['client_id','user_delivery_man_id','total','status'];

	public function cupom()
	{
		//return $this->hasOne(Cupom::class,'id','cupom_id');
		return $this->belongsTo(Cupom::class);
	}

	public function orderitems()
	{
		return $this->hasMany(OrderItem::class);
	}

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function deliveryman()
	{
		return $this->belongsTo(User::class,'user_delivery_man_id','id');
	}

	// public function getTotalAttribute($value)
	// {
	// 	return number_format($value,2,",",".");
	// }

	// public function setTotalAttribute($value)
	// {
	// 	$this->attributes['total'] = floatval(str_replace(',','.',str_replace('.','',$value)));
	// }


}

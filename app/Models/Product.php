<?php

namespace Delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Product extends Model implements Transformable
{
	use TransformableTrait;    
	protected $fillable = ['category_id','name','description','price'];
	
	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function orderitems()
	{
		return $this->hasMany(OrderItem::class);
	}

	// public function getPriceAttribute($value)
	// {
	// 	return number_format($value,2,",",".");
	// }

	// public function setPriceAttribute($value)
	// {						
	// 	$this->attributes['price'] = floatval(str_replace(',','.',str_replace('.','',$value)));	
	// }
}

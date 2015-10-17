<?php

namespace Delivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class OrderItem extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable =['product_id','order_id','price','qtd'];    		            


	public function products()
	{
		return $this->belongsTo(Product::class,'product_id');	
	}


	public function order()
	{
		return $this->belongsTo(Order::class);
	}


	public function getPriceAttribute($value)
	{
		return number_format($value,2,",",".");
	}

	public function setPriceAttribute($value)
	{						
		$this->attributes['price'] = floatval(str_replace(',','.',str_replace('.','',$value)));	
	}

}

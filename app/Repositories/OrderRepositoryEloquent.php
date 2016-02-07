<?php

namespace Delivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Delivery\Repositories\OrderRepository;
use Delivery\Models\Order;

    /**
    * Class OrderRepositoryEloquent
    * @package namespace Delivery\Repositories;
    */
    class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
    {
        public function getByIdAndDeliveryman($id,$idDeliveryman)
        {
            $result = $this->with(['orderitems','client','cupom'])->findWhere([
                'id'=>$id,
                'user_delivery_man_id'=> $idDeliveryman
                ]);
            if($result instanceof Collection)
            {
                $result = $result->frist();
                $result->orderitems->each(function($item){
                    $item->product;
                });
                return $result;
            }
            return $result->first();
        }

    /**
    * Specify Model class name
    *
    * @return string
    */
    public function model()
    {
        return Order::class;
    }

    /**
    * Boot up the repository, pushing criteria
    */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

<?php

namespace Delivery\Http\Controllers\Api\Deliveryman;

use Delivery\Http\Controllers\Controller;
use Delivery\Http\Requests;
use Delivery\Repositories\OrderRepository;

use Delivery\Repositories\UserRepository;
use Delivery\Services\OrderService;

use Delivery\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;


use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class DeliverymanCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;

    private $orderService;

    public function __construct(OrderRepository $OrderRepository, UserRepository $UserRepository, OrderService $OrderService)
    {
        $this->orderRepository = $OrderRepository;
        $this->orderService = $OrderService;
        $this->userRepository = $UserRepository;

    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository->with(['orderitems'])->scopeQuery(function($query) use ($id){
            return $query->where('user_delivery_man_id','=',$id)->orderBy('created_at','desc');
        })->paginate();
        return $orders;
    }

    public function show($id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->orderRepository->getByIdAndDeliveryman($id,$idDeliveryman);
    }


    public function updatStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderService->updateStatus($id,$idDeliveryman,$request->get('status'));
        if($order)
        {
            return $order;
        }
        abort(400,'order não encontrada');
    }

}

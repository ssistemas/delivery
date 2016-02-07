<?php

namespace Delivery\Http\Controllers\Api\Client;

use Delivery\Http\Controllers\Controller;
use Delivery\Http\Requests;
use Delivery\Repositories\OrderRepository;
//use Delivery\Repositories\ProductRepository;
use Delivery\Repositories\UserRepository;
use Delivery\Services\OrderService;

use Delivery\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    //private $productRepository;
    private $orderService;

    public function __construct(OrderRepository $OrderRepository, UserRepository $UserRepository,OrderService $OrderService)
    {
        $this->orderRepository = $OrderRepository;
        $this->orderService = $OrderService;
        $this->userRepository = $UserRepository;
       // $this->productRepository =$ProductRepository;
    }

    public function index()
    {

        $client = $this->userRepository->find(Authorizer::getResourceOwnerId())->client->id;
        $orders = $this->orderRepository->with(['orderitems'])->scopeQuery(function($query) use ($client){
            return $query->where('client_id','=',$client)->orderBy('created_at','desc');
        })->paginate();
        return $orders;
    }


    public function store(CheckoutRequest $request)
    {
        $data=$request->all();
        $client = $this->userRepository->find(Authorizer::getResourceOwnerId())->client->id;
        $data['client_id']=$client;
        $order = $this->orderService->create($data);
        $order = $this->orderRepository->with(['orderitems'])->find($order->id);
        return $order;
    }

    public function show($id)
    {
        $order = $this->orderRepository->with(['orderitems','client','cupom'])->find($id);
        $order->orderitems->each(function($item){
            $item->product;
        });
        return $order;
    }

}

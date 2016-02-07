<?php

namespace Delivery\Http\Controllers\Api\Client;

use Delivery\Http\Controllers\Controller;
use Delivery\Http\Requests;
use Delivery\Repositories\OrderRepository;
use Delivery\Repositories\UserRepository;
use Delivery\Services\OrderService;

use Delivery\Http\Requests\CheckoutRequest;
use Illuminate\Http\Request;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCheckoutController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $orderService;
    private $with = ['orderitems','client','cupom'];

    public function __construct(OrderRepository $OrderRepository, UserRepository $UserRepository,OrderService $OrderService)
    {
        $this->orderRepository = $OrderRepository;
        $this->orderService = $OrderService;
        $this->userRepository = $UserRepository;
    }

    public function index()
    {
        $client = $this->userRepository->find(Authorizer::getResourceOwnerId())->client->id;
        $orders = $this->orderRepository
        ->skipPresenter(false)
        ->with($this->with)
        ->scopeQuery(function($query) use ($client){
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
        return $this->orderRepository
        ->skipPresenter(false)
        ->with($this->with)
        ->find($order->id);
    }

    public function show($id)
    {
        return $this->orderRepository
        ->skipPresenter(false)
        ->with($this->with)
        ->find($id);
    }

}

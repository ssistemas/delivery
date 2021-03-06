<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;

use Delivery\Repositories\OrderRepository;
use Delivery\Repositories\UserRepository;
use Delivery\Repositories\ProductRepository;
use Delivery\Http\Requests\CheckoutRequest;
use Delivery\Services\OrderService;

class DeliveriesController extends Controller
{
    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    public function __construct(OrderRepository $OrderRepository, UserRepository $UserRepository,ProductRepository $ProductRepository,OrderService $OrderService)
    {
        $this->orderRepository = $OrderRepository;
        $this->orderService = $OrderService;
        $this->userRepository = $UserRepository;
        $this->productRepository =$ProductRepository;
    }

    public function index()
    {

     $deliveryman = $this->userRepository->find(\Auth::user()->id);
      //dd($deliveryman);
     $orders = $this->orderRepository->scopeQuery(function($query) use ($deliveryman){
        return $query->where('user_delivery_man_id','=',$deliveryman->id);
    })->paginate();

     return view('delivery.orders.index',compact('orders'));
 }

 public function create()
 {
    $products = $this->productRepository->all(['price','name','id']);
    return view('delivery.orders.create',compact('products'));
}

public function store(CheckoutRequest $request)
{
    $data=$request->all();
    $client = $this->userRepository->find(\Auth::user()->id)->client->id;
    $data['client_id']=$client;
    $this->orderService->create($data);
        // $flag = $this->repository->create($request->all());
        // if (is_null($flag))
        // {
        //     session()->flash('message-danger','Error ao gravar os dados.');
        // }
        // else
        // {
        //     session()->flash('message-success','Dados gravados com sucesso.');
        // }
    return redirect()->route('delivery.orders.index');
}

public function show($id)
{

}

public function edit($id)
{
        // $Checkout = $this->repository->find($id);
        // return view('admin.categories.edit',compact('Checkout'));
}

public function update(CheckoutRequest $request, $id)
{
        // $flag = $this->repository->update($request->all(),$id);
        // if (is_null($flag))
        // {
        //     session()->flash('message-danger','Error ao gravar os dados.');
        // }
        // else
        // {
        //     session()->flash('message-success','Dados gravados com sucesso.');
        // }
        // return redirect()->route('admin.categories.index');
}

public function destroy($id)
{
        // if (count($this->repository->find($id)->products))
        // {
        //     session()->flash('message-warning','Este registro não pode ser apagado.');
        // }
        // else
        // {
        //     $this->repository->delete($id);
        //     session()->flash('message-success','Registro apagado com sucesso.');
        // }
        // return redirect()->route('admin.categories.index');
}
}

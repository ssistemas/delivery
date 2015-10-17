<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;

use Delivery\Repositories\OrderRepository;
use Delivery\Repositories\UserRepository;

use Delivery\Http\Requests\OrderRequest;
class OrdersController extends Controller
{

    private $repository;

    public function __construct(OrderRepository $OrderRepository)
    {
        $this->repository = $OrderRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate(5);
        if ($orders->total()==0)
        {
            session()->flash('message-info',$orders->total().' registro(s) encontrado(s).');
        }
        return view('admin.orders.index',compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(OrderRequest $request)
    {
        $flag = $this->repository->create($request->all());
        if (is_null($flag))
        {
            session()->flash('message-danger','Error ao gravar os dados.');
        }
        else
        {
            session()->flash('message-success','Dados gravados com sucesso.');
        }
        return redirect()->route('admin.orders.index');
    }

    public function show($id)
    {

    }

    public function edit($id, UserRepository $user)
    {
        $list_status= ['0'=>'Pendente', '1'=>'A caminho', '2'=>'Entregue','3'=>'Cancelado'];
        $list_deliveryman = $user->getDeliveryMan();
        $order = $this->repository->find($id);
       return view('admin.orders.edit',compact('order','list_status','list_deliveryman'));
    }

    public function update(OrderRequest $request, $id)
    {
        $flag = $this->repository->update($request->all(),$id);
        if (is_null($flag))
        {
            session()->flash('message-danger','Error ao gravar os dados.');
        }
        else
        {
            session()->flash('message-success','Dados gravados com sucesso.');
        }
        return redirect()->route('admin.orders.index');
    }

    public function destroy($id)
    {
        if (count($this->repository->find($id)->orderitems))
        {
            session()->flash('message-warning','Este registro não pode ser apagado.');
        }
        else
        {
            $this->repository->delete($id);
            session()->flash('message-success','Registro apagado com sucesso.');
        }
        return redirect()->route('admin.orders.index');
    }
}

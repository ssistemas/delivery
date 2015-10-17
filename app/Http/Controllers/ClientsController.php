<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;

use Delivery\Services\ClientService;
use Delivery\Repositories\ClientRepository;
use Delivery\Http\Requests\ClientRequest;


class ClientsController extends Controller
{

    private $repository;    
    private $ClientService;

    public function __construct(ClientRepository $ClientRepository, ClientService $ClientService)
    {
        $this->repository = $ClientRepository;
        $this->ClientService = $ClientService;
    }

    public function index()
    {
        $clients = $this->repository->paginate(5);
        if ($clients->total()==0)
        {
            session()->flash('message-info',$clients->total().' registro(s) encontrado(s).');
        }       
        return view('admin.clients.index',compact('clients'));
    }

    public function create()
    {           
        return view('admin.clients.create');
    }

    public function store(ClientRequest $request)
    {
        $flag = $this->ClientService->create($request->all());
        if (is_null($flag))
        {
            session()->flash('message-danger','Error ao gravar os dados.');
        }
        else
        {
            session()->flash('message-success','Dados gravados com sucesso.');
        }
        return redirect()->route('admin.clients.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $client = $this->repository->with('user')->find($id);         
        return view('admin.clients.edit',compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
       // $flag = $this->repository->update($request->all(),$id);
        $flag = $this->ClientService->update($request->all(),$id);
        if (is_null($flag))
        {
            session()->flash('message-danger','Error ao gravar os dados.');
        }
        else
        {
            session()->flash('message-success','Dados gravados com sucesso.');
        }
        return redirect()->route('admin.clients.index');
    }

    public function destroy($id)
    {
        if (count($this->repository->find($id)->user))
        {
            session()->flash('message-warning','Este registro não pode ser apagado.');
        }
        else
        {
            $this->repository->delete($id);
            session()->flash('message-success','Registro apagado com sucesso.');
        }
        return redirect()->route('admin.clients.index');
    }  
}

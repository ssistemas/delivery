<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;
use Delivery\Repositories\CupomRepository;
use Delivery\Http\Requests\CupomRequest;

class CupomsController extends Controller
{

    private $repository;

    public function __construct(CupomRepository $CupomRepository)
    {
        $this->repository = $CupomRepository;
    }

    public function index()
    {
        $cupoms = $this->repository->paginate(5);
        if ($cupoms->total()==0)
        {
            session()->flash('message-info',$cupoms->total().' registro(s) encontrado(s).');
        }
        return view('admin.cupoms.index',compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(CupomRequest $request)
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
        return redirect()->route('admin.cupoms.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $cupom = $this->repository->find($id);
        return view('admin.cupoms.edit',compact('cupom'));
    }

    public function update(CupomRequest $request, $id)
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
        return redirect()->route('admin.cupoms.index');
    }

    public function destroy($id)
    {
       if (count($this->repository->find($id)->order))
        {
            session()->flash('message-warning','Este registro não pode ser apagado.');
        }
        else
        {
            $this->repository->delete($id);
            session()->flash('message-success','Registro apagado com sucesso.');
        }
        return redirect()->route('admin.cupoms.index');
    }
}

<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;
use Delivery\Repositories\CategoryRepository;
use Delivery\Http\Requests\CategoryRequest;
class CategoriesController extends Controller
{

    private $repository;

    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->repository = $CategoryRepository;
    }

    public function index()
    {
        $categories = $this->repository->paginate(5);
        if ($categories->total()==0)
        {
            session()->flash('message-info',$categories->total().' registro(s) encontrado(s).');
        }
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
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
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryRequest $request, $id)
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
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        if (count($this->repository->find($id)->products))
        {
            session()->flash('message-warning','Este registro não pode ser apagado.');
        }
        else
        {
            $this->repository->delete($id);
            session()->flash('message-success','Registro apagado com sucesso.');
        }
        return redirect()->route('admin.categories.index');
    }  
}

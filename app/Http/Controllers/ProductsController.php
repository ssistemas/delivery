<?php

namespace Delivery\Http\Controllers;

use Illuminate\Http\Request;
use Delivery\Http\Requests;
use Delivery\Http\Controllers\Controller;
use Delivery\Repositories\ProductRepository;
use Delivery\Repositories\CategoryRepository;
use Delivery\Http\Requests\ProductRequest;
class ProductsController extends Controller
{

    private $Repository;
    private $categoryRepository;

    public function __construct(ProductRepository $ProductRepository, CategoryRepository $CategoryRepository)
    {
        $this->repository = $ProductRepository;
        $this->categoryRepository = $CategoryRepository;
    }

    public function index()
    {
        $products = $this->repository->paginate(5);
        if ($products->total()==0)
        {
            session()->flash('message-info',$products->total().' registro(s) encontrado(s).');
        }
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all()->lists('name','id')->toArray();
        return view('admin.products.create',compact('categories'));
    }

    public function store(ProductRequest $request)
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
        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->all()->lists('name','id')->toArray();
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(ProductRequest $request, $id)
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
        return redirect()->route('admin.products.index');
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
        return redirect()->route('admin.products.index');
    }
}
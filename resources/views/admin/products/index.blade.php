@extends('app')

@section('content')
<div class="container">
	<h3>Podutos</h3>
	<a href="{{ route('admin.products.create') }}" class="btn btn-default">Novo Produto</a>
	<br /><br />
	<div class="table-responsive">	
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Categoria</th>
					<th>Preço</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($products as $product)								
				<tr>
					<td>{{$product->id}}</td>
					<td>{{$product->name}}</td>
					<td>{{$product->category->name}}</td>
					<td>{{$product->price}}</td>
					<td>
						<a href="{{ route('admin.products.edit',$product->id) }}" class="btn btn-success btn-sm" >Editar</a>
						<a href="{{ route('admin.products.delete',$product->id) }}" class="btn btn-danger btn-sm">Apagar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!!$products->render()!!}
		</div>	
	</div>
</div>
@endsection
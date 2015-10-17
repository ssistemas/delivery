@extends('app')

@section('content')
<div class="container">
	<h3>Categorias</h3>
	<a href="{{ route('admin.categories.create') }}" class="btn btn-default">Nova Categoria</a>
	<br /><br />
	<div class="table-responsive">	
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)								
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>
					<a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-success btn-sm" >Editar</a>

					<a href="{{ route('admin.categories.delete',$category->id) }}" class="btn btn-danger btn-sm">Apagar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!!$categories->render()!!}
		</div>	
	</div>
</div>
@endsection
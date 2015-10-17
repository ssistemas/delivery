@extends('app')

@section('content')
<div class="container">
	<h3>Cupoms</h3>
	<a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Novo Cupom</a>
	<br /><br />
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Code</th>
					<th>Preço</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cupoms as $cupom)
				<tr>
					<td>{{$cupom->id}}</td>
					<td>{{$cupom->code}}</td>
					<td>{{$cupom->price}}</td>
					<td>
					<a href="{{ route('admin.cupoms.edit',$cupom->id) }}" class="btn btn-success btn-sm" >Editar</a>

					<a href="{{ route('admin.cupoms.delete',$cupom->id) }}" class="btn btn-danger btn-sm">Apagar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!!$cupoms->render()!!}
		</div>	
	</div>
</div>
@endsection
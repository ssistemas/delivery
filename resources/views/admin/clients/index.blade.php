@extends('app')

@section('content')
<div class="container">
	<h3>Clientes</h3>
	<a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo Cliente</a>
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
				@foreach ($clients as $client)								
				<tr>
					<td>{{$client->id}}</td>
					<td>{{$client->user->name}}</td>					
					<td>
					<a href="{{ route('admin.clients.edit',$client->id) }}" class="btn btn-success btn-sm" >Editar</a>

					<a href="{{ route('admin.clients.delete',$client->id) }}" class="btn btn-danger btn-sm">Apagar</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{!!$clients->render()!!}
		</div>	
	</div>
</div>
@endsection
@extends('app')
@section('content')
<div class="container">
	<h3>Editar Cliente</h3>
	{!! Form::model($client,['route'=>['admin.clients.update',$client->id],'method'=>'PUT','class'=>'form-horizontal']) !!}

	@include('admin.clients._form')

	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>
	
	{!! Form::close() !!}
	
</div>
</div>
@endsection
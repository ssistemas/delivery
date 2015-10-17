@extends('app')
@section('content')
<div class="container">
	<h3>Nova Categoria</h3>
	{!! Form::open(['route'=>'admin.categories.store','method'=>'POST','class'=>'form-horizontal']) !!}

	@include('admin.categories._form')


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>
	
	{!! Form::close() !!}
	
</div>
</div>
@endsection
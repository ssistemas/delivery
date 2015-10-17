@extends('app')
@section('content')
<div class="container">
	<h3>Novo Produto</h3>
	{!! Form::open(['route'=>'admin.products.store','method'=>'POST','class'=>'form-horizontal']) !!}

	@include('admin.products._form')


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>
	
	{!! Form::close() !!}
	
</div>
</div>
@endsection
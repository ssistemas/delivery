@extends('app')
@section('content')
<div class="container">
	<h3>Nova Cupom</h3>
	{!! Form::open(['route'=>'admin.cupoms.store','method'=>'POST','class'=>'form-horizontal']) !!}

	@include('admin.cupoms._form')


	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>
	
	{!! Form::close() !!}
	
</div>
</div>
@endsection
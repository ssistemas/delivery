@extends('app')
@section('content')
<div class="container">
	<h3>Novo Pedido</h3>
	{!! Form::open(['route'=>'customer.orders.store','method'=>'POST','class'=>'form-horizontal']) !!}

	@include('customer.orders._form')

	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>

	{!! Form::close() !!}

</div>
</div>
@endsection
@extends('app')
@section('content')
<div class="container">
	<h2>Pedido # {{$order->id}} - {{$order->total}}</h2>
	<h3>Cliente: {{$order->client->user->name}}</h3>
	<h4>Data: {{$order->created_at}} - {{$order->total}}</h4>
	<p>
		<b>Entregar em:</b>	<br>
		<b>Endereço:</b> {{$order->client->address}} <br>
		<b>Cidade:</b>	{{$order->client->city}} <br>
		<b>Estado:</b>	{{$order->client->state}}<br> 
		<b>CEP:</b> {{$order->client->zipcode}} 
	</p>

	{!! Form::model($order, ['route'=>['admin.orders.update',$order->id],'method'=>'PUT','class'=>'form-horizontal']) !!}

	@include('admin.orders._form')

	<div class="form-group">
		<div class="col-md-12">
			<button type="submit" class="btn btn-primary">Salvar</button>
		</div>
	</div>
	
	{!! Form::close() !!}
	
</div>
</div>
@endsection
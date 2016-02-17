@extends('app')

@section('content')
<div class="container">
	<h3>Meus Pedidos</h3>
	<a class="btn btn-default" href="{{ route('customer.orders.create') }}">Novo Pedido</a>
	<br><br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>total</th>
					<th>status</th>
					<th>Ação</th>
				</tr>
			</thead>
			@foreach ($orders as $order)
			<tbody>
				<tr>
					<td>#{{$order->id}}</td>
					<td>{{$order->total}}</td>
					<td>{{$order->status}}</td>
					<td>
						{{--<a href="{{ route('customer.orders.delete',$order->id) }}" class="btn btn-danger btn-sm">Cancelar</a>--}}
					</td>
				</tr>
				<tr>
					<td colspan="6">
						<ul>
							@foreach ($order->orderitems as $item)
							<li>{{$item->products->name}}</li>
							@endforeach
						</ul>
					</td>
				</tr>
			</tbody>
			@endforeach
		</table>
		<div class="text-center">
			{!!$orders->render()!!}
		</div>
	</div>
</div>
@endsection
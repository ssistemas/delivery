@extends('app')

@section('content')
<div class="container">
	<h3>Pedidos</h3>
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Pedido Nº</th>
					<th>data</th>
					{{-- <th>itens</th> --}}
					<th>Situação</th>
					<th>Entregador</th>
					<th>Total</th>
					<th>Ação</th>
				</tr>
			</thead>
			@foreach ($orders as $order)
			<tbody>

				<tr>
					<td>#{{$order->id}}</td>
					<td>{{$order->created_at}}</td>
					<td>{{$order->status}}</td>
					<td>{{$order->deliveryman->name}}</td>
					<td>{{$order->total}}</td>
					<td>
						<a href="{{ route('admin.orders.edit',$order->id) }}" class="btn btn-success btn-sm">Editar</a>
						<a href="{{ route('admin.orders.delete',$order->id) }}" class="btn btn-danger btn-sm">Cancelar</a>
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
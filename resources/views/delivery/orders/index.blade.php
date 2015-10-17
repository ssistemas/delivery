@extends('app')

@section('content')
<div class="container">
	<h3>Minhas entregas</h3>
	<br><br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>id</th>
					<th>Total</th>
					<th>Status</th>
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
						<a href="#" class="btn btn-danger btn-sm">Cancelar entrega</a>
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
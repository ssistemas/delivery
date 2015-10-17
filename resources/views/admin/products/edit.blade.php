@extends('app')
@section('content')
<div class="container">
	<h3>Editar Produto</h3>
	{!! Form::model($product, ['route'=>['admin.products.update',$product->id],'method'=>'PUT','class'=>'form-horizontal']) !!}

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
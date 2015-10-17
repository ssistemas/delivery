@extends('app')
@section('content')
<div class="container">
	<h3>Editar Categoria</h3>
	{!! Form::model($cupom, ['route'=>['admin.cupoms.update',$cupom->id],'method'=>'PUT','class'=>'form-horizontal']) !!}

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
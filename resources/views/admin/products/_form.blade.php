<div class="form-group"> 
	<div class="col-md-12">
		{!! Form::label('name', 'Nome') !!}
		{!! Form::text('name', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-12">
		{!! Form::label('description', 'Descrição') !!}
		{!! Form::textarea('description', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-12">
		{!! Form::label('category_id', 'Categora') !!}		
		{!! Form::select('category_id',$categories, null,['class'=>'form-control']) !!}  		
	</div>
	<div class="col-md-12">
		{!! Form::label('price', 'Preço') !!}
		{!! Form::text('price', null,['class'=>'form-control']) !!}  
	</div>
</div>
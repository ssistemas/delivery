<div class="form-group"> 
	<div class="col-md-12">
		{!! Form::label('name', 'Nome') !!}
		{!! Form::text('user[name]', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-12">
		{!! Form::label('email', 'Email') !!}
		{!! Form::text('user[email]', null,['class'=>'form-control']) !!}  
	</div>	
	<div class="col-md-12">
		{!! Form::label('phone', 'Telefone') !!}
		{!! Form::text('phone', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-12">
		{!! Form::label('address', 'Endereço') !!}
		{!! Form::textarea('address', null,['class'=>'form-control','rows'=>'2']) !!}  
	</div>	
	<div class="col-md-4">
		{!! Form::label('city', 'Cidade') !!}
		{!! Form::text('city', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-4">
		{!! Form::label('state', 'Estado') !!}
		{!! Form::text('state', null,['class'=>'form-control']) !!}  
	</div>
	<div class="col-md-4">
		{!! Form::label('zipcode', 'CEP') !!}
		{!! Form::text('zipcode', null,['class'=>'form-control']) !!}  
	</div>

</div>
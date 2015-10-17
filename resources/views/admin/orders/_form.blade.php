<div class="form-group"> 
	<div class="col-md-12">
		{!! Form::label('Status', 'Status') !!}		
		{!! Form::select('status',$list_status, null,['class'=>'form-control']) !!}  		
	</div>
	<div class="col-md-12">
		{!! Form::label('user_delivery_man_id', 'Entregador') !!}		
		{!! Form::select('user_delivery_man_id',$list_deliveryman, null,['class'=>'form-control']) !!}  		
	</div>
</div>
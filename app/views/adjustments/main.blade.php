@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Histórico
	</div>
	<div class="col-xs-2 line">
		{{ link_to('ajustes', '', array('class' => 'glyphicon glyphicon-plus', 'style' => 'color: green;font-size: 1em;')) }}
	</div>
@stop
@section('left-content')
	@foreach ($adjustments as $adjustment)
		<div class="col-xs-12 line">
			{{ link_to('ajustes/'.$adjustment->id, substr($adjustment->created_at, 0, 10) . ' - ' . $adjustment->product->name) }}
			@if($id==$adjustment->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
@stop


@section('main-title')
	Ajustes
@stop
@section('main-content')
	{{ Form::open(array('url' => 'ajustes', 'role' => 'form', 'id' => 'frmAdjustment')) }}
		<div class="col-xs-12">
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('products_id') ? 'has-error' : '' }}">
					{{ Form::label('products_id', 'Producto:', array('class' => 'control-label')) }}
					{{ Form::select('products_id', array('' => ' - Seleccione - ') + $products, $selectedAdjustment->products_id, array('class' => 'form-control', 'id' => 'products_id')) }}
					{{ Form::label('', $errors->first('products_id'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('type') ? 'has-error' : '' }}">
					{{ Form::label('type', 'Tipo:', array('class' => 'control-label')) }}
					{{ Form::select('type', Adjustment::$types, $selectedAdjustment->type, array('class' => 'form-control', 'id' => 'type')) }}
					{{ Form::label('', $errors->first('type'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
					{{ Form::label('amount', 'Cantidad:', array('class' => 'control-label')) }}
					{{ Form::text('amount', $selectedAdjustment->amount, array('class' => 'form-control', 'id' => 'amount')) }}
					{{ Form::label('', $errors->first('amount'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('reason') ? 'has-error' : '' }}">
					{{ Form::label('reason', 'Razón:', array('class' => 'control-label')) }}
					{{ Form::textArea('reason', $selectedAdjustment->reason, array('class' => 'form-control', 'id' => 'reason')) }}
					{{ Form::label('', $errors->first('reason'), array('class' => 'control-label')) }}
				</div>
			</div>

			
			<div class="col-xs-12 line center"><br /><br />
				{{ Form::hidden('id', $selectedAdjustment->id, array('id' => 'id')) }}
				{{ link_to('ajustes', 'Cancelar', array('class' => 'btn btn-danger')) }}
				@if ( ! $selectedAdjustment->id)
					{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
				@endif
			</div>
		</div>
	{{ Form::close() }}
@stop
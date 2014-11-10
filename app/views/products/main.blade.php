@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Productos
	</div>
	<div class="col-xs-2 line">
		{{ link_to('productos', '', array('class' => 'glyphicon glyphicon-plus', 'style' => 'color: green;font-size: 1em;')) }}
	</div>
@stop
@section('left-content')
	@foreach ($products as $product)
		<div class="col-xs-12 line">
			{{ link_to('productos/'.$product->id, $product->name) }}
			@if($id==$product->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
	{{ $products->appends(array('search' => $search))->links() }}
@stop


@section('main-title')
	Administración de Productos
@stop
@section('main-content')
	{{ Form::open(array('url' => 'productos', 'role' => 'form', 'id' => 'frmProduct')) }}
		<div class="col-xs-12">
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{{ Form::label('name', 'Producto:', array('class' => 'control-label')) }}
					{{ Form::text('name', $selectedProduct->name, array('class' => 'form-control', 'id' => 'name', 'maxlength' => '45')) }}
					{{ Form::label('', $errors->first('name'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('cost') ? 'has-error' : '' }}">
					{{ Form::label('cost', 'Costo Unitario: (ejemplo: 0.00)', array('class' => 'control-label')) }}
					{{ Form::text('cost', number_format(round($selectedProduct->cost,2),2), array('class' => 'form-control', 'id' => 'cost')) }}
					{{ Form::label('', $errors->first('cost'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('minimum_stock') ? 'has-error' : '' }}">
					{{ Form::label('minimum_stock', 'Stock mínimo:', array('class' => 'control-label')) }}
					{{ Form::text('minimum_stock', $selectedProduct->minimum_stock, array('class' => 'form-control', 'id' => 'minimum_stock')) }}
					{{ Form::label('', $errors->first('minimum_stock'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group">
					{{ Form::label('stock', 'Stock actual:', array('class' => 'control-label')) }}
					<br/>{{{ $selectedProduct->stock ? $selectedProduct->stock : 0 }}} unidades
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('description') ? 'has-error' : '' }}">
					{{ Form::label('description', 'Descripción:', array('class' => 'control-label')) }}
					{{ Form::textArea('description', $selectedProduct->description, array('class' => 'form-control', 'id' => 'description')) }}
					{{ Form::label('', $errors->first('description'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('code') ? 'has-error' : '' }}">
					{{ Form::label('code', 'Código:', array('class' => 'control-label')) }}
					{{ Form::text('code', $selectedProduct->code, array('class' => 'form-control', 'id' => 'code')) }}
					{{ Form::label('', $errors->first('code'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					{{ Form::label('status', 'Estado:', array('class' => 'control-label')) }}
					{{ Form::select('status', array('active'=>'Activo', 'inactive'=>'Inactivo'),($selectedProduct->trashed()?'inactive':'active'), array('class' => 'form-control', 'id' => 'status')) }}
					{{ Form::label('', $errors->first('status'), array('class' => 'control-label')) }}
				</div>
			</div>
			
			<div class="col-xs-12 line center"><br /><br />
				{{ Form::hidden('id', $selectedProduct->id, array('id' => 'id')) }}
				{{ link_to('productos', 'Cancelar', array('class' => 'btn btn-danger')) }}
				{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop
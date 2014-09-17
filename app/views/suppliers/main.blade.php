@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Distribuidores
	</div>
	<div class="col-xs-2 line">
		{{ link_to('distribuidores', '', array('class' => 'glyphicon glyphicon-plus', 'style' => 'color: green;font-size: 1em;')) }}
	</div>
@stop
@section('left-content')
	@foreach ($suppliers as $supplier)
		<div class="col-xs-12 line">
			{{ link_to('distribuidores/'.$supplier->id, $supplier->name) }}
			@if($id==$supplier->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
@stop


@section('main-title')
	Administración de Distribuidores
@stop
@section('main-content')
	<ul class="nav nav-tabs" role="tablist">
		<li class="active">
			<a href="#detail" role="tab" data-toggle="tab">Detalle</a>
		</li>
		@if($selectedSupplier->id)
			<li>
				<a href="#products" role="tab" data-toggle="tab">Productos</a>
			</li>
		@endif
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="detail">
			{{ Form::open(array('url' => 'distribuidores', 'role' => 'form', 'id' => 'frmSupplier')) }}
				<div class="col-xs-12">
					<div class="col-xs-12 line">
						<div class="col-xs-5 line form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							{{ Form::label('name', 'Nombre:', array('class' => 'control-label')) }}
							{{ Form::text('name', $selectedSupplier->name, array('class' => 'form-control', 'id' => 'name')) }}
							{{ Form::label('', $errors->first('name'), array('class' => 'control-label')) }}
						</div>
						<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('ruc') ? 'has-error' : '' }}">
							{{ Form::label('ruc', 'RUC:', array('class' => 'control-label')) }}
							{{ Form::text('ruc', $selectedSupplier->ruc, array('class' => 'form-control', 'id' => 'ruc')) }}
							{{ Form::label('', $errors->first('ruc'), array('class' => 'control-label')) }}
						</div>
					</div>
					<div class="col-xs-12 line">
						<div class="col-xs-5 line form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
							{{ Form::label('phone', 'Teléfono:', array('class' => 'control-label')) }}
							{{ Form::text('phone', $selectedSupplier->phone, array('class' => 'form-control', 'id' => 'phone')) }}
							{{ Form::label('', $errors->first('phone'), array('class' => 'control-label')) }}
						</div>
						<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('email') ? 'has-error' : '' }}">
							{{ Form::label('email', 'Email:', array('class' => 'control-label')) }}
							{{ Form::text('email', $selectedSupplier->email, array('class' => 'form-control', 'id' => 'email')) }}
							{{ Form::label('', $errors->first('email'), array('class' => 'control-label')) }}
						</div>
					</div>
					<div class="col-xs-12 line">
						<div class="col-xs-5 line form-group {{ $errors->has('web') ? 'has-error' : '' }}">
							{{ Form::label('web', 'Página Web:', array('class' => 'control-label')) }}
							{{ Form::text('web', $selectedSupplier->web, array('class' => 'form-control', 'id' => 'web')) }}
							{{ Form::label('', $errors->first('web'), array('class' => 'control-label')) }}
						</div>
						<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('address') ? 'has-error' : '' }}">
							{{ Form::label('address', 'Dirección:', array('class' => 'control-label')) }}
							{{ Form::text('address', $selectedSupplier->address, array('class' => 'form-control', 'id' => 'address')) }}
							{{ Form::label('', $errors->first('address'), array('class' => 'control-label')) }}
						</div>
					</div>
					<div class="col-xs-12 line">
						<div class="col-xs-5 line form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
							{{ Form::label('contact', 'Nombre de Contacto:', array('class' => 'control-label')) }}
							{{ Form::text('contact', $selectedSupplier->contact, array('class' => 'form-control', 'id' => 'contact')) }}
							{{ Form::label('', $errors->first('contact'), array('class' => 'control-label')) }}
						</div>
						<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('contact_phone') ? 'has-error' : '' }}">
							{{ Form::label('contact_phone', 'Teléfono de Contacto:', array('class' => 'control-label')) }}
							{{ Form::text('contact_phone', $selectedSupplier->contact_phone, array('class' => 'form-control', 'id' => 'contact_phone')) }}
							{{ Form::label('', $errors->first('contact_phone'), array('class' => 'control-label')) }}
						</div>
					</div>
					<div class="col-xs-12 line">
						<div class="col-xs-5 line form-group {{ $errors->has('status') ? 'has-error' : '' }}">
							{{ Form::label('status', 'Estado:', array('class' => 'control-label')) }}
							{{ Form::select('status', array('active'=>'Activo', 'inactive'=>'Inactivo'),($selectedSupplier->trashed()?'inactive':'active'), array('class' => 'form-control', 'id' => 'status')) }}
							{{ Form::label('', $errors->first('status'), array('class' => 'control-label')) }}
						</div>
					</div>
					
					<div class="col-xs-12 line center"><br /><br />
						{{ Form::hidden('id', $selectedSupplier->id, array('id' => 'id')) }}
						{{ link_to('distribuidores', 'Cancelar', array('class' => 'btn btn-danger')) }}
						{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
					</div>
				</div>
			{{ Form::close() }}
		</div>
		@if($selectedSupplier->id)
			<div class="tab-pane" id="products">
				<div class="col-xs-12">
					<div class="col-xs-12 line">
						<center>
							{{ Form::select('not_selected', $allProducts, $selectedSupplierProducts, array('class' => 'form-control', 'id'=>'not_selected','multiple'=>'multiple')) }}
						</center>
					</div>
				</div>
			</div>
		@endif
	</div>
@stop
@if($selectedSupplier->id)
	@section('js')
		@parent
		<script type="text/javascript">
			TESIS.Suppliers = TESIS.Suppliers || {};

			TESIS.Suppliers = {
				setListeners: function(){
					$('#not_selected').multiSelect({
						selectableHeader: "<span>Disponibles:</div>",
						selectionHeader: "<span>Seleccionados:</div>",
						afterSelect: function(values){
							$.ajax({
								url: TESIS.url+'/distribuidoresProductos',
								type: 'post',
								data: { 
									supplierId: '{{$selectedSupplier->id}}', 
									items: values, 
									action: 'select', 
									_token: '{{csrf_token()}}' 
								},
								dataType: 'json',
								success: function(data){
									//maybe do something here.
								}
							});
						},
						afterDeselect: function(values){
							$.ajax({
								url: TESIS.url+'/distribuidoresProductos',
								type: 'post',
								data: { 
									supplierId: '{{$selectedSupplier->id}}', 
									items: values, 
									action: 'deselect', 
									_token: '{{csrf_token()}}' 
								},
								dataType: 'json',
								success: function(data){
									//maybe do something here.
								}
							});
						}
					});
				},
				init: function() {
					TESIS.Suppliers.setListeners();
				}
			};

			$(document).ready(function() {
				TESIS.Suppliers.init();
			});
		</script>
	@stop
@endif
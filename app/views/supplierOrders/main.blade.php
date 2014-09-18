@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Pendientes
	</div>
	<div class="col-xs-2 line">
		{{ link_to('distribuidores', '', array('class' => 'glyphicon glyphicon-plus', 'style' => 'color: green;font-size: 1em;')) }}
	</div>
@stop
@section('left-content')
	@foreach ($supplierOrders as $supplierOrder)
		<div class="col-xs-12 line">
			{{ link_to('pedidos/'.$supplierOrder->id, substr($supplierOrder->created_at, 0, 10) . ' - ' . $supplierOrder->supplier->name) }}
			@if($id==$supplierOrder->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
@stop


@section('main-title')
	Pedidos
@stop
@section('main-content')
	{{ Form::open(array('url' => 'pedidos', 'role' => 'form', 'id' => 'frmSupplier')) }}
		<div class="col-xs-12">
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('suppliers_id') ? 'has-error' : '' }}">
					{{ Form::label('suppliers_id', 'Distribuidor:', array('class' => 'control-label')) }}
					@if ( ! $selectedSupplierOrder->id)
						{{ Form::select('suppliers_id', array('' => ' - Seleccione - ') + $suppliers, $selectedSupplierOrder->suppliers_id, array('class' => 'form-control', 'id' => 'suppliers_id')) }}
					@else
						{{ $selectedSupplierOrder->supplier->name }}
						{{ Form::hidden('suppliers_id', $selectedSupplierOrder->suppliers_id) }}
					@endif
					{{ Form::label('', $errors->first('suppliers_id'), array('class' => 'control-label')) }}
				</div>
				@if ( ! $selectedSupplierOrder->id)
					<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('products') ? 'has-error' : '' }}">
						{{ Form::label('product', 'Productos:', array('class' => 'control-label')) }}
						<div>
							{{ Form::select('product', array('' => ' - Seleccione - '), null, array('class' => 'form-control', 'id' => 'product')) }}
						</div>
						{{ Form::label('', $errors->first('products'), array('class' => 'control-label')) }}
					</div>
				@endif
			</div>
			
			<div class="col-xs-12 line">
				<table id="table" class="table table-striped">
					<thead>
						<tr>
	                        <th class="col-xs-2">Cantidad</th>
	                        <th>Producto</th>
	                        @if ( ! $selectedSupplierOrder->id)
								<th class="col-xs-1">Acciones</th>
							@endif	
						</tr>
					</thead>
					<tbody data-bind="foreach: products">
						<tr data-bind="value: id">
							@if ( ! $selectedSupplierOrder->id)
		                        <td>
		                            <span class="col-xs-1 glyphicon glyphicon-plus" data-bind="click: $root.addAmount"></span>
		                            <span class="col-xs-1" data-bind="text: amount"></span>
		                            <span class="col-xs-1 glyphicon glyphicon-minus" data-bind="click: $root.decreaseAmount"></span>
		                        </td>
	                        @else
								<td>
		                            <span class="col-xs-1" data-bind="text: amount"></span>
		                        </td>
							@endif
	                        <td data-bind="text: name"></td>
	                        @if ( ! $selectedSupplierOrder->id)
		                        <td>
		                            <span class="col-xs-12 glyphicon glyphicon-trash" data-bind="click: $root.removeProduct"span></span>
		                        </td>
							@endif
						</tr>
					</tbody>
				</table>
			</div>
			
			<div class="col-xs-12 line center"><br /><br />
				{{ link_to('pedidos', 'Cancelar', array('class' => 'btn btn-danger')) }}
				@if ( ! $selectedSupplierOrder->id)
					{{ Form::button('Guardar', array('data-bind' => 'click: save', 'id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
				@else
					{{ Form::hidden('received', '1') }}
					{{ Form::button('Recibido', array('data-bind' => 'click: save', 'id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
				@endif
				{{ Form::hidden('id', $selectedSupplierOrder->id, array('id' => 'id')) }}
				{{ Form::textArea('products', json_encode($products), array('id' => 'products', 'class' => 'hide')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('js')
	@parent
	<script type="text/javascript">
		TESIS.Suppliers = TESIS.Suppliers || {};

		TESIS.Suppliers = {
			products: function(data) {
                var self = this;
                self.id = ko.observable(data.id);
                self.amount = ko.observable(data.amount);
                self.name = ko.observable(data.name);
            },
            AppViewModel: function() {
                var self = this;
                var aux = [];
                var products_data = JSON.parse($('#products').val());
		        if(products_data != 0){
		            $.each(products_data, function(index,value) {
		                aux.push(new TESIS.Suppliers.products( {id:value.id, name:value.name, amount:value.pivot.amount} )); 
		            });
		            self.products = ko.observableArray(aux);
		        }else{
		            self.products = ko.observableArray();
		        }

                self.addProduct = function(id, name) {
                    var newProduct = new TESIS.Suppliers.products({
                        id: id,
                        amount: 1,
                        name: name
                    });

                    var match = ko.utils.arrayFirst(self.products(), function(item) {
                        return newProduct.id() == item.id();
                    });

                    if ( ! match) {
                        self.products.push(newProduct);
                    } else {
                        alert('No puede agregar 2 veces el mismo producto.');
                    }
                };
                self.removeProduct = function(product) {
                    self.products.remove(product);  
                };
                self.addAmount = function(product) {
                    product.amount(product.amount()+1);
                };
                self.decreaseAmount = function(product) {
                    if(product.amount() > 1) {
                        product.amount(product.amount()-1);
                    }
                };
                self.save = function() {
                    var params = ko.toJSON(self.products);
                    $('#products').val(params);
                    $('#btnSubmit').attr('disabled',true);
                    $('#frmSupplier').submit();
                }
            },
			setListeners: function(){
				$('#suppliers_id').on('change',function(){
					$.ajax({
                        url: TESIS.url + '/productos/cargarProductosProveedor',
                        data: {
                        	_token: '{{ csrf_token() }}',
                        	suppliersId: $(this).val()
                        },
                        type: "post",
                        dataType: 'html',
                        success: function(data) {
                        	$('#product').val('');
                            $('#product').parent('div').html(data);
                            $('#product').on('change', function(){
                            	var context = ko.contextFor(this);
                            	context.$root.addProduct($(this).val(), $(this).children('option:selected').text());
                            });
                        }
                    });
				});
			},
			init: function() {
				TESIS.Suppliers.setListeners();
				ko.applyBindings(new TESIS.Suppliers.AppViewModel());
			}
		};

		$(document).ready(function() {
			TESIS.Suppliers.init();
		});
	</script>
@stop
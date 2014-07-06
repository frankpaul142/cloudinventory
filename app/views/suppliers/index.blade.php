@extends('layouts.master')

@section('content')
	<div class="row">
	    <h3 class="col-md-offset-2">Administración de Proveedores</h3><br/>
	    <div class="col-md-offset-1 col-md-10">
			<table id="table">
				<thead>
					<tr>
						<th>Nombre Comercial</th>
						<th>Nombre Legal</th>
						<th>Ciudad</th>
                        <th>Documento</th>
                        <th>Teléfono 1</th>
                        <th>Email</th>
                        <th></th>
					</tr>
				</thead>
				<tbody>
					@if (isset($suppliers))
						@foreach ($suppliers as $supplier)
							<tr>
								<td>{{ $supplier->comercial_name }}</td>
								<td>{{ $supplier->legal_name }}</td>
								<td>{{ $supplier->city->name }}</td>
								<td>{{ $supplier->document }}</td>
								<td>{{ $supplier->phone_1 }}</td>
								<td>{{ $supplier->email }}</td>
								<td>
                                    <a href="{{ url('proveedores/form/'.$supplier->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="{{ url('proveedores/eliminar/'.$supplier->id) }}" class="delete-element"><i class="glyphicon glyphicon-trash"></i></a>
                                </td>
							</tr>
						@endforeach
					@endif		
				</tbody>
			</table>
			{{ link_to('proveedores/form', 'Crear Proveedor', array('class' => 'btn btn-primary')) }}
		</div>
	</div>
@stop
@section('js')
	@parent
    <script type="text/javascript">
        TEQUILA.Suppliers = TEQUILA.Suppliers || {};
        
        TEQUILA.Suppliers = {
            setListeners: function(){
				$('.delete-element').click(function(){
                    return confirm('Está seguro que desea eliminar el proveedor');
                });
			},
            init: function() {
                TEQUILA.Suppliers.setListeners();
				$('#table').dataTable();        
			}
        };
        $(document).ready(function() {
            TEQUILA.Suppliers.init();
        });		
	</script>	
@stop
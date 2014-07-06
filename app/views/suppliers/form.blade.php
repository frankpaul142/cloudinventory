@extends('layouts.master')

@section('content')
    {{ Form::model($supplier, array('url' => 'proveedores/form') ) }}
	<div class="row">
        <h3 class="row center">Administración de Proveedores</h3><br/>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('comercial_name') ? 'has-error' : '' }}">
                {{ Form::label('comercial_name', 'Nombre Comercial:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('comercial_name', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('comercial_name'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('legal_name') ? 'has-error' : '' }}">
                {{ Form::label('legal_name', 'Nombre Legal:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('legal_name', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('legal_name'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('cities_id') ? 'has-error' : '' }}">
                {{ Form::label('cities_id', 'Ciudad:', array('class' => 'control-label')); }}<br/>
                {{ Form::select('cities_id', $cities, null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('cities_id'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('document') ? 'has-error' : '' }}">
                {{ Form::label('document', 'Documento:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('document', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('document'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                {{ Form::label('phone_1', 'Teléfono 1:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('phone_1', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('phone_1'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
                {{ Form::label('phone_2', 'Teléfono 2:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('phone_2', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('phone_2'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                {{ Form::label('email', 'Email:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('email', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('email'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('web') ? 'has-error' : '' }}">
                {{ Form::label('web', 'Web:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('web', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('web'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('person_type') ? 'has-error' : '' }}">
                {{ Form::label('person_type', 'Tipo de Persona:', array('class' => 'control-label')); }}<br/>
                {{ Form::select('person_type', $person_types, null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('person_type'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                {{ Form::label('type', 'Tipo:', array('class' => 'control-label')); }}<br/>
                {{ Form::select('type', $types, null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('type'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('work_days') ? 'has-error' : '' }}">
                {{ Form::label('work_days', 'Días de Trabajo:', array('class' => 'control-label')); }}<br/>
                {{ Form::textarea('work_days', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('work_days'), array('class' => 'control-label')) }}
            </div>
            <div class="col-md-offset-1 col-md-4 line form-group {{ $errors->has('work_hours') ? 'has-error' : '' }}">
                {{ Form::label('work_hours', 'Horas de Trabajo:', array('class' => 'control-label')); }}<br/>
                {{ Form::textarea('work_hours', null, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('work_hours'), array('class' => 'control-label')) }}
            </div>
        </div>
        <div class="col-md-offset-2 col-md-10 line">
            <div class="col-md-4 line form-group {{ $errors->has('approved_by') ? 'has-error' : '' }}">
                {{ Form::label('approved_by', 'Aprobado por:', array('class' => 'control-label')); }}<br/>
                {{ Form::text('approved_by', 1, array('class' => 'form-control')) }}
                {{ Form::label('', $errors->first('approved_by'), array('class' => 'control-label')) }}
            </div>
        </div>
        @if ($supplier)
            <div class="col-md-offset-1 col-md-10 line">
                <h4 class="row">Direcciones</h4><br/>
                <table id="tableAddress">
                    <thead>
                        <tr>
                            <th>Calle 1</th>
                            <th>Calle 2</th>
                            <th>Número</th>
                            <th>Sector</th>
                            <th>Es principal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($addresses))
                            @foreach ($addresses as $address)
                                <?php $principal = ($address->main_address == 1) ? 'Si' : 'No';?>
                                <tr>
                                    <td>{{ $address->street_1 }}</td>
                                    <td>{{ $address->street_2 }}</td>
                                    <td>{{ $address->number }}</td>
                                    <td>{{ $address->sector }}</td>
                                    <td>{{ $principal }}</td>
                                    <td>
                                        <a href="{{ url('direcciones_proveedores/form/'.$supplier->id.'/'.$address->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ url('direcciones_proveedores/eliminar/'.$supplier->id.'/'.$address->id) }}" class="delete-address"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif		
                    </tbody>
                </table>
                {{ link_to('direcciones_proveedores/form/'.$supplier->id, 'Crear Dirección', array('class' => 'btn btn-primary btn-sm')) }}
            </div>
            <div class="col-md-offset-1 col-md-10 line">
                <h4 class="row">Contactos</h4><br/>
                <table id="tableContacts">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Móvil</th>
                            <th>Tipo</th>
                            <th>Es principal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($contacts))
                            @foreach ($contacts as $contact)
                                <?php $principalContact = ($contact->main_contact == 1) ? 'Si' : 'No';?>
                                <tr>
                                    <td>{{ $contact->first_name }}</td>
                                    <td>{{ $contact->last_name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->mobile }}</td>
                                    <td>{{ $contact->type }}</td>
                                    <td>{{ $principalContact }}</td>
                                    <td>
                                        <a href="{{ url('contactos_proveedores/form/'.$supplier->id.'/'.$contact->id) }}"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{{ url('contactos_proveedores/eliminar/'.$supplier->id.'/'.$contact->id) }}" class="delete-contact"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif		
                    </tbody>
                </table>
                {{ link_to('contactos_proveedores/form/'.$supplier->id, 'Crear Contacto', array('class' => 'btn btn-primary btn-sm')) }}
            </div>
        @endif
        <div class="col-md-12 center">
            {{ Form::hidden('id')}}
            {{ link_to('proveedores', 'Cancelar', array('class' => 'btn btn-primary')) }}
            {{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-inverse')) }}
        </div>
	</div>	
    {{ Form::close() }}
@stop
@section('js')
	@parent
    <script type="text/javascript">
        TEQUILA.Suppliers = TEQUILA.Suppliers || {};
        
        TEQUILA.Suppliers.form = {
            setListeners: function(){
				$('.delete-address').click(function(){
                    return confirm('Está seguro que desea eliminar la dirección?');
                });
                $('.delete-contact').click(function(){
                    return confirm('Está seguro que desea eliminar el contacto?');
                });
			},
            init: function() {
                TEQUILA.Suppliers.form.setListeners();
				$('#tableAddress').dataTable();        
				$('#tableContacts').dataTable();        
			}
        };
        $(document).ready(function() {
            TEQUILA.Suppliers.form.init();
        });		
	</script>	
@stop
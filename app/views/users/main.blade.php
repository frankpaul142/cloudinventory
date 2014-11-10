@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Usuarios
	</div>
	<div class="col-xs-2 line">
		{{ link_to('usuarios', '', array('class' => 'glyphicon glyphicon-plus', 'style' => 'color: green;font-size: 1em;')) }}
	</div>
@stop
@section('left-content')
	@foreach ($users as $user)
		<div class="col-xs-12 line">
			@if(is_null($user->is_approved))
				<span class="glyphicon glyphicon-warning-sign" title="Pendiente aprobación"></span>
			@elseif($user->is_approved == false)
				<span class="glyphicon glyphicon-remove" title="Rechazado"></span>
			@else
				<span class="glyphicon glyphicon-ok" title="Aprobado"></span>
			@endif
			{{ link_to('usuarios/'.$user->id, $user->last_name . ' ' . $user->name) }}
			@if($id==$user->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
	{{ $users->appends(array('search' => $search))->links() }}
@stop


@section('main-title')
	Administración de Usuarios
@stop
@section('main-content')
	{{ Form::open(array('url' => 'usuarios', 'role' => 'form', 'id' => 'frmUser')) }}
		<div class="col-xs-12">
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('name') ? 'has-error' : '' }}">
					{{ Form::label('name', 'Nombre:', array('class' => 'control-label')) }}
					{{ Form::text('name', $selectedUser->name, array('class' => 'form-control', 'id' => 'name')) }}
					{{ Form::label('', $errors->first('name'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
					{{ Form::label('last_name', 'Apellido:', array('class' => 'control-label')) }}
					{{ Form::text('last_name', $selectedUser->last_name, array('class' => 'form-control', 'id' => 'last_name')) }}
					{{ Form::label('', $errors->first('last_name'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
					{{ Form::label('display_name', 'Nombre a mostrar:', array('class' => 'control-label')) }}
					{{ Form::text('display_name', $selectedUser->display_name, array('class' => 'form-control', 'id' => 'display_name')) }}
					{{ Form::label('', $errors->first('display_name'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('profile_type') ? 'has-error' : '' }}">
					{{ Form::label('profile_type', 'Perfil:', array('class' => 'control-label')) }}
					{{ Form::select('profile_type', $profiles, $selectedUser->profile_type, array('class' => 'form-control', 'id' => 'profile_type')) }}
					{{ Form::label('', $errors->first('profile_type'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					{{ Form::label('email', 'Email: (usado para iniciar sesión)', array('class' => 'control-label')) }}
					{{ Form::text('email', $selectedUser->email, array('class' => 'form-control', 'id' => 'email')) }}
					{{ Form::label('', $errors->first('email'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
					{{ Form::label('mobile', 'Celular:', array('class' => 'control-label')) }}
					{{ Form::text('mobile', $selectedUser->mobile, array('class' => 'form-control', 'id' => 'mobile', 'placeholder' => '0999999999', 'maxlength' => '10')) }}
					{{ Form::label('', $errors->first('mobile'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-12 line">
				<div class="col-xs-5 line form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
					{{ Form::label('approved', 'Aprobado?', array('class' => 'control-label')) }}
					{{ Form::select('approved', array('' => ' - Seleccione - ') + User::$status, $selectedUser->is_approved ? 'approved' : (is_null($selectedUser->is_approved) ? '' : 'not_approved'), array('class' => 'form-control', 'id' => 'approved')) }}
					{{ Form::label('', $errors->first('approved'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-5 line form-group {{ $errors->has('status') ? 'has-error' : '' }}">
					{{ Form::label('status', 'Estado:', array('class' => 'control-label')) }}
					{{ Form::select('status', array('active'=>'Activo', 'inactive'=>'Inactivo'),($selectedUser->trashed()?'inactive':'active'), array('class' => 'form-control', 'id' => 'status')) }}
					{{ Form::label('', $errors->first('status'), array('class' => 'control-label')) }}
				</div>
			</div>



			
			<div class="col-xs-12 line center"><br /><br />
				{{ Form::hidden('id', $selectedUser->id, array('id' => 'id')) }}
				{{ link_to('usuarios', 'Cancelar', array('class' => 'btn btn-danger')) }}
				{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop
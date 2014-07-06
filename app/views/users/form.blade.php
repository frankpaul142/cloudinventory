@extends('layouts.master')
@section('styles')
	@parent
	<style type="text/css">
		.icon{
			cursor: pointer;
		}
	</style>
@stop
@section('content')
	{{ Form::open(array('url' => 'usuarios/form', 'role' => 'form', 'id' => 'frmUser')) }}
		<div class="col-xs-12">
			<h3 class="col-sm-12 center">Administración de Usuarios</h3><br/>
			<div class="col-xs-offset-2 col-xs-10 line">
				<div class="col-xs-4 line form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
					{{ Form::label('display_name', 'Nombre:', array('class' => 'control-label')) }}
					{{ Form::text('display_name', $user->display_name, array('class' => 'form-control', 'id' => 'display_name')) }}
					{{ Form::label('', $errors->first('display_name'), array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-4 line form-group {{ $errors->has('profiles_id') ? 'has-error' : '' }}">
					{{ Form::label('profiles_id', 'Perfil:', array('class' => 'control-label')) }}
					{{ Form::select('profiles_id', $profiles, $user->profiles_id, array('class' => 'form-control', 'id' => 'profiles_id')) }}
					{{ Form::label('', $errors->first('profiles_id'), array('class' => 'control-label')) }}
				</div>
			</div>
			<div class="col-xs-offset-2 col-xs-10 line">
				<div class="col-xs-4 line form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					{{ Form::label('email', 'E-mail:', array('class' => 'control-label')) }}
					{{ Form::text('email', $user->email, array('class' => 'form-control', 'id' => 'email')) }}
					{{ Form::label('', $errors->first('email'), array('class' => 'control-label')) }}
				</div>
			</div>
			@if ($user->id)
				<div class="col-xs-offset-2 col-xs-9 line">
					{{ Form::checkbox('change_password', 'change', false, array('id'=>'change_password')) }}
					{{ Form::label('change_password', 'Cambiar contraseña?', array('class' => 'control-label')) }}
				</div>
				<div class="col-xs-offset-2 col-xs-10 line {{ (Input::old('change_password')) ? 'show' : 'hide' }}" id="password_container">
					<div class="col-xs-4 line form-group {{ $errors->has('password') ? 'has-error' : '' }}">
						{{ Form::label('password', 'Contraseña:', array('class' => 'control-label')) }}
						{{ Form::password('password', array('class' => 'form-control', 'id' => 'password')) }}
						{{ Form::label('', $errors->first('password'), array('class' => 'control-label')) }}
					</div>
					<div class="col-xs-offset-2 col-xs-4 line form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
						{{ Form::label('password_confirmation', ' Confirmar contraseña:', array('class' => 'control-label')) }}
						{{ Form::password('password_confirmation', array('class' => 'form-control', 'id' => 'password_confirmation')) }}
						{{ Form::label('', $errors->first('password_confirmation'), array('class' => 'control-label')) }}
					</div>
				</div>
			@endif

			<div class="col-xs-12 line center"><br /><br />
				{{ Form::hidden('id', $user->id, array('id' => 'id')) }}
				{{ link_to('usuarios', 'Cancelar', array('class' => 'btn btn-primary')) }}
				{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-inverse')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop

@section('js')
	@parent
	<script type="text/javascript">
		TEQUILA.Users = TEQUILA.Users || {};

		TEQUILA.Users = {
			setListeners: function(){
				$('#change_password').on('change', function () {
					if ($(this).is(':checked')) {
						$('#password_container').removeClass('hide').addClass('show');
					}else{
						$('#password_container').removeClass('show').addClass('hide');
					}
				});
			},
			init: function() {
				TEQUILA.Users.setListeners();
			}
		};

		$(document).ready(function() {
			TEQUILA.Users.init();
		});
	</script>
@stop
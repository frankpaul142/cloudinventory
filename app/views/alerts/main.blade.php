@extends('layouts.master')

@section('left-title')
	<div class="col-xs-10 line">
		Usuarios
	</div>
@stop
@section('left-content')
	@foreach ($users as $user)
		<div class="col-xs-12 line">
			{{ link_to('alertas/'.$user->id, $user->last_name . ' ' . $user->name) }}
			@if($usersId==$user->id)
				&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-eye-open"></span>
			@endif
		</div>
	@endforeach
	{{ $users->appends(array('search' => $search))->links() }}
@stop


@section('main-title')
	Asociar Alertas
@stop
@section('main-content')
	{{ Form::open(array('url' => 'alertas', 'role' => 'form', 'id' => 'frmAdjustment')) }}
		<div class="col-xs-12">
			<div class="col-xs-12 line">
				{{ Form::label('', 'Asociar alertas al usuario: ' . $selectedUser->last_name . ' ' . $selectedUser->first_name, array('class' => 'control-label')) }}
			</div>
			<div class="col-xs-12 line">
				<table class="table table-stripped">
					<tbody>
						<tr>
							<td></td>
							@if ($selectedUser->facebook_id)
								<td>Facebook</td>
							@endif
							<td>E-mail</td>
							<td>SMS</td>
						</tr>
						@foreach ($alerts as $alert)
							<tr>
								<td title="{{ $alert->description }}">{{ $alert->name }}</td>
								@if ($selectedUser->facebook_id)
									<td>
										{{ Form::checkbox('alerts[' . $alert->id . '][]', 'fb', isset($selectedUserAlerts[$alert->id]) ? $selectedUserAlerts[$alert->id]['fb'] : false) }}
									</td>
								@endif
								<td>
									{{ Form::checkbox('alerts[' . $alert->id . '][]', 'mail', isset($selectedUserAlerts[$alert->id]) ? $selectedUserAlerts[$alert->id]['mail'] : false) }}
								</td>
								<td>
									{{ Form::checkbox('alerts[' . $alert->id . '][]', 'sms', isset($selectedUserAlerts[$alert->id]) ? $selectedUserAlerts[$alert->id]['sms'] : false) }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>

			
			<div class="col-xs-12 line center"><br /><br />
				{{ Form::hidden('users_id', $selectedUser->id, array('id' => 'id')) }}
				{{ link_to('alertas', 'Cancelar', array('class' => 'btn btn-danger')) }}
				{{ Form::submit('Guardar', array('id' => 'btnSubmit', 'class' => 'btn btn-primary')) }}
			</div>
		</div>
	{{ Form::close() }}
@stop
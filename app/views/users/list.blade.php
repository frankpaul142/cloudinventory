@extends('layouts.master')
@section('styles')
	@parent
	<style type="text/css">
		a:hover{
			text-decoration: none;
			cursor: pointer;
		}
	</style>
@stop
@section('content')
	<div class="col-md-12">
		<h3 class="col-sm-offset-2">Administración de Usuarios</h3><br/>
		<div class="col-sm-offset-2 col-md-8">
			<table id="tblUsers" class="col-md-8">
				<thead>
					<tr>
						<th>Usuario</th>
						<th>Perfil</th>
						<th>E-mail</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $user)
						<tr>
							<td>{{{ $user->display_name }}}</td>
							<td>{{{ $user->profile->name }}}</td>
							<td>{{{ $user->email }}}</td>
							<td>{{{ ! $user->trashed()?'Activo':'Inactivo' }}}</td>
							<td>
								{{ link_to('usuarios/form/'.$user->id, '', array('class' => 'glyphicon glyphicon-eye-open')) }}
								@if ($user->trashed())
									{{ link_to('usuarios/estado/'.$user->id, '', array('title' => 'Activar', 'class' => 'glyphicon glyphicon-ok')) }}
								@else
									{{ link_to('usuarios/estado/'.$user->id, '', array('title' => 'Desactivar', 'class' => 'glyphicon glyphicon-remove')) }}
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
			
@stop

@section('js')
	@parent
	<script type="text/javascript">
		TEQUILA.Users = TEQUILA.Users || {};

		TEQUILA.Users = {
			setListeners: function(){
				$('[id^="change_"]').each(function(){
					var $clicked = $(this);
					$clicked.on('click', function (e) {
						e.preventDefault();
						var id = $clicked.attr('id').replace('change_','');
						if (confirm('¿Está seguro que desea ' + $clicked.attr('title') + ' este registro?')) {
							$.ajax({
								url: TEQUILA.url + '/usuarios/changeStatus',
								type: 'post',
								dataType: 'json',
								data: {
									id: id
								},
								success: function (data) {
									if (data==true) {
										location.href = TEQUILA.url + '/usuarios';
									}
								}
							});
						}
					});
				});
			},
			init: function() {
				TEQUILA.Users.setListeners();
				$('#tblUsers').dataTable({

				});
			}
		};

		$(document).ready(function() {
			TEQUILA.Users.init();
		});
	</script>
@stop
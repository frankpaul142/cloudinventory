<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>
	        @section('title')
	            CloudInventory
	        @show
	    </title>
		<!-- CSS -->
	    @section('styles')
	        {{ HTML::style('css/bootstrap.min.css') }}
	        {{ HTML::style('css/style.css') }}
	        {{ HTML::style('css/jquery.dataTables.min.css') }}
	        {{ HTML::style('css/menu.css') }}
	    @show
	</head>
	<body>
		<div id="wrap">
			<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<a class="navbar-brand" href="#">CloudInventory</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>{{ link_to('usuarios', 'Usuarios') }}</li>
							<li>{{ link_to('', 'Productos') }}</li>
							<li>{{ link_to('', 'Proveedores') }}</li>
							<li>{{ link_to('', 'Ajustes') }}</li>
							<li>{{ link_to('', 'Alertas') }}</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Cuenta <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li>{{ link_to('cambiarContrasena', 'Cambiar Contraseña') }}</li>
									<li class="divider"></li>
									<li>{{ link_to('logout', 'Cerrar Sesión') }}</li>
								</ul>
							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
	        <div class="container">
	        	@if (Session::has('warning'))
                    <div class="alert alert-warning col-md-12 ">{{ Session::get('warning') }}</div>
                @endif
                @if (Session::has('info'))
                    <div class="alert alert-info col-md-12 ">{{ Session::get('info') }}</div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success col-md-12 ">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger col-md-12 ">{{ Session::get('error') }}</div>
                @endif
                <div class="col-xs-12">
	                <div class="col-xs-3 left-content">
	                	<div class="col-xs-12 left-title">
		                	@yield('left-title')
				        </div>
	                	@yield('left-content')
	                </div>
	            	<div class="col-xs-8 main-content">
	            		<div class="col-xs-12 main-title">
		            		@yield('main-title')
				        </div>
	            		@yield('main-content')
	        		</div>
        		</div>
			</div>
			<!-- Javascripts -->
		    @section('js')
		        {{ HTML::script('js/jquery-1.10.2.min.js') }}
		        {{ HTML::script('js/bootstrap.min.js') }}
		        {{ HTML::script('js/menu.js') }}
		        {{ HTML::script('js/jquery.dataTables.min.js') }}
		        <script type="text/javascript">
		            var TESIS = TESIS || {};
		            TESIS.url = '{{ URL::to('') }}';

		            $(document).ready(function() {
		            	$.extend( $.fn.dataTable.defaults, {
			            	"language": {
								"paginate": {
									"sFirst": "Primera",
									"sLast": "&Uacute;ltima",
									"sNext": "Siguiente",
									"sPrevious": "Anterior"
								},
							    "aria": {
							        "sortAscending":  ": activar para ordenar ascendentemente",
							        "sortDescending": ": activar para ordenar descendentemente"
							    },
								"emptyTable": "No hay registros",
								"lengthMenu": "Mostrar _MENU_ registros por P&aacute;gina",
								"zeroRecords": "No se encontraron resultados",
								"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
								"infoEmpty": "",
								"infoFiltered": "(filtrado de _MAX_ registros en total)",
								"search": "Filtro:",
								"processing": "Filtrando..",
								"loadingRecords": "Cargando..."
							},
							"sDom": 'T<"clear">lfrtip',
							"oTableTools": {
								"sSwfPath": TESIS.url+"img/dataTables/copy_cvs_xls_pdf.swf",
								"aButtons": []
							}
			            });
		            });

		        </script>
		    @show 
		     <div class="footer-container">
                 <br/><br/><br/>
	        </div> 
		</div><!-- end wrap -->
	</body>
</html>
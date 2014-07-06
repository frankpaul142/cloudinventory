<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>
        @section('title')
            Club Miles - 
        @show
    </title>
	<!-- CSS -->
    @section('styles')
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/jquery.dataTables.min.css') }}
    @show
</head>
<body>
	<div id="wrap">        
        <nav class="navbar navbar-default">
        	<div class="header-container">
			<p class="navbar-text">Club Miles</p>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos</a>
					<ul class="dropdown-menu">
						<li><a href="#">Administrar Marcas</a></li>
						<li><a href="#">Administrar Categorias</a></li>
						<li><a href="#">Administrar Impuestos</a></li>
						<li><a href="#">Administrar Caracteristicas</a></li>
					</ul>
				</li>
			</ul>
			</div>
		</nav>
        <div class="container">

        	@yield('content')
		
		</div>
		<!-- Javascripts -->
	    @section('js')
	        {{ HTML::script('js/jquery-1.11.1.min.js') }}
	        {{ HTML::script('js/jquery.dataTables.min.js') }}	        
	    @show 
	    <!-- <div class="footer-container">
            &copy;{{{ date('Y') }}} Club Miles&reg; Ecuador. Derechos Reservados.         
        </div> -->
	</div><!-- end wrap -->
	
</body>
</html>
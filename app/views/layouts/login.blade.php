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
        @show
    </head>
    <body>
        @yield('content')
        @section('js')
            {{ HTML::script('js/jquery-1.10.2.min.js') }}
            {{ HTML::script('js/bootstrap.min.js') }}
            <script type="text/javascript">
                var TEQUILA = TEQUILA || {};
            </script>
        @show
    </body>
</html>
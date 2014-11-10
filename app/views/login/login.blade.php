@extends('layouts.login')

@section('content')
	<div class="container">
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading line">
                    <div class="panel-title">Iniciar Sesión</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-20px">
                        {{ link_to('recordar', '¿Olvidó su contraseña?') }}
                    </div>
                </div>
                <div class="panel-body">
                    @if (Session::has('message'))
                        <div class="alert alert-danger col-sm-12 ">{{ Session::get('message') }}</div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success col-sm-12 ">{{ Session::get('success') }}</div>
                    @endif

                    <div class="col-sm-12">
                        {{ Form::open(array('url' => 'login', 'role' => 'form', 'id' => 'frmLogin')) }}
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('username') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                {{ Form::text('username', null, array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Usuario', 'title' => $errors->first('username'))) }}
                            </div>
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                {{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Contraseña', 'title' => $errors->first('password'))) }}
                            </div>

                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    {{ Form::submit('Entrar', array('id' => 'btnSubmit', 'class' => 'btn btn-success')) }}									<a href="{{ $loginurl }}"> Login con Facebook </a>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    @parent
    <script type="text/javascript">
        TEQUILA.Login = TEQUILA.Login || {};

        TEQUILA.Login = {
            init: function() {
                $('.has-error input').each(function(){
                    $(this).tooltip();
                });
            }
        };

        $(document).ready(function() {
            TEQUILA.Login.init();
        });
    </script>
@stop
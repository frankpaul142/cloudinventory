@extends('layouts.login')

@section('content')
	<div class="container">
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading line">
                    <div class="panel-title">Cambio de Contraseña</div>
                </div>
                <div class="panel-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger col-sm-12 ">{{ Session::get('error') }}</div>
                    @elseif (Session::has('status'))
                        <div class="alert alert-success col-sm-12 ">{{ Session::get('status') }}</div>
                    @endif
                    <div class="col-sm-12">
                        {{ Form::open(array('url' => 'cambiarContrasena', 'role' => 'form', 'id' => 'frmChange')) }}
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('current_pass') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                {{ Form::password('current_pass', array('class' => 'form-control', 'id' => 'current_pass', 'placeholder' => 'Contraseña Actual', 'title' => $errors->first('current_pass'))) }}
                            </div>
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('password') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Nueva Contraseña', 'title' => $errors->first('password'))) }}
                            </div>
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Confirmar Nueva Contraseña', 'title' => $errors->first('password_confirmation'))) }}
                            </div>
                            
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    {{ Form::submit('Aceptar', array('id' => 'btnSubmit', 'class' => 'btn btn-success')) }}
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
        TEQUILA.Change = TEQUILA.Change || {};

        TEQUILA.Change = {
            init: function() {
                $('.has-error input').each(function(){
                    $(this).tooltip();
                });
            }
        };

        $(document).ready(function() {
            TEQUILA.Change.init();
        });
    </script>
@stop
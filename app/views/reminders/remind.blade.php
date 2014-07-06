@extends('layouts.login')

@section('content')
	<div class="container">
        <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading line">
                    <div class="panel-title">¿Olvidó su Contraseña?</div>
                </div>
                <div class="panel-body">
                    @if (Session::has('error'))
                        <div class="alert alert-danger col-sm-12 ">{{ Session::get('error') }}</div>
                    @elseif (Session::has('success'))
                        <div class="alert alert-success col-sm-12 ">{{ Session::get('success') }}</div>
                    @endif
                    <div class="col-sm-12">
                        {{ Form::open(array('url' => 'recordar', 'role' => 'form', 'id' => 'frmRemind')) }}
                            <div style="margin-bottom: 25px" class="input-group line {{ $errors->has('email') ? 'has-error' : '' }}">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                {{ Form::text('email', null, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Correo electrónico', 'title' => $errors->first('email'))) }}
                            </div>
                            
                            <div style="margin-top:10px" class="form-group">
                                <div class="col-sm-12 controls">
                                    {{ Form::submit('Enviar recordatorio', array('id' => 'btnSubmit', 'class' => 'btn btn-success')) }}
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
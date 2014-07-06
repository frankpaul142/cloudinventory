@extends('layouts.mail')

@section('content')
	<h2>Cambio de Contraseña</h2><br />
	<br />
	Para cambiar su contraseña llene el siguiente formulario: {{ URL::to('recordar/form', array($token)) }}.
    <br />
    <br />
    Atentamente,<br />
    <br />
    Club Miles
@stop
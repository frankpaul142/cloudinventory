@extends('layouts.mail')

@section('content')
    Su cuenta de usuario en Club Miles ha cambiado.<br />
    Sus nuevos datos de inicio de sesión son:<br />
    <br />
    <b>Nombre de usuario: </b>{{{ $user }}}<br />
    <b>Contraseña: </b>{{{ $password }}}<br />
    <br />
    Recuerde que tiene que cambiar su contraseña en su siguiente inicio de sesión.<br />
    <br />
    <br />
    Atentamente,<br />
    <br />
    Club Miles
@stop
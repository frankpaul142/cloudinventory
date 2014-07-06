@extends('layouts.mail')

@section('content')
    Bienvenido a Club Miles.<br />
    <br />
    Su cuenta ha sido creado exitosamente.<br />
    Sus datos de inicio de sesión son:<br />
    <br />
    <b>Nombre de usuario: </b>{{{ $user }}}<br />
    <b>Contraseña: </b>{{{ $password }}}<br />
    <br />
    Recuerde que tiene que cambiar su contraseña cuando inicie sesión por primera vez.<br />
    <br />
    <br />
    Atentamente,<br />
    <br />
    Club Miles
@stop
@extends('layouts.mail')

@section('content')
    Ha recibido una alerta de CloudInventory.<br />
    <br />
    <b>{{{ $text }}}</b><br />
    <br />
    <br />
    Atentamente,<br />
    <br />
    CloudInventory
@stop
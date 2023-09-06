@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <h4>Home Page</h4>
    <p>Este contenido es público</p>

    @role ('admin')
        <p>Sólo lo va a ver el rol admin</p>
    @elseif ('escritor')
        <p>Sólo lo va a ver el rol escritor</p>
    @endrole
@endsection

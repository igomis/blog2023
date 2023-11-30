@extends('layouts.plantilla')

@section('titulo', 'Ficha post')

@section('contenido')
    <h1>Ficha del post {{ $id }}</h1>
    <x-alert type="success" message="Operación completada con éxito." />
    <x-alert type="danger" message="Hubo un error en la operación." />
@endsection

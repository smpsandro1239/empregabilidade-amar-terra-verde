@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem-vindo, Administrador {{ auth()->user()->name }}!</h1>
        <p>Gerencie usuários e ofertas.</p>
    </div>
@endsection

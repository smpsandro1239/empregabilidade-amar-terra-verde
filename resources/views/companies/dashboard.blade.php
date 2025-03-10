@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem-vindo, Empresa {{ auth()->user()->name }}!</h1>
        <p>Crie e gerencie suas ofertas de emprego.</p>
    </div>
@endsection

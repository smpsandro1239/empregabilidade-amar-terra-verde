@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bem-vindo, Aluno {{ auth()->user()->name }}!</h1>
        <p>Explore as ofertas de emprego disponíveis.</p>
    </div>
@endsection

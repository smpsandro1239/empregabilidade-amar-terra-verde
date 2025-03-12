@extends('layouts.app')
@section('title', 'Dashboard do Administrador')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Bem-vindo, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 text-lg">Gerencie usuários e ofertas.</p>
        <!-- Placeholder para funcionalidades futuras -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-gray-600">Em breve: Ferramentas de administração.</p>
        </div>
    </div>
@endsection

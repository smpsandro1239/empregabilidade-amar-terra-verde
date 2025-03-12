@extends('layouts.app')
@section('title', 'Dashboard do Aluno')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Bem-vindo, {{ auth()->user()->name }}!</h1>
        <p class="text-gray-600 text-lg">Explore novas oportunidades de emprego.</p>
        <div class="flex space-x-4">
            <a href="{{ route('job-offers.index') }}" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Ver Ofertas</a>
            <a href="{{ route('applications.studentIndex') }}" class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-700 transition-all duration-300 transform hover:scale-105">Meu Histórico</a>
        </div>
    </div>
@endsection

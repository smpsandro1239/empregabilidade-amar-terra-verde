@extends('layouts.app')
@section('title', 'Dashboard da Empresa')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Bem-vindo, {{ auth()->user()->name }}!</h1>
        <div class="flex space-x-4">
            <a href="{{ route('job-offers.create') }}" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown with-700 transition-all duration-300 transform hover:scale-105">Nova Oferta</a>
            <a href="{{ route('applications.index') }}" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Candidaturas</a>
            <a href="{{ route('companies.reports') }}" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Relatórios</a>
        </div>
        @if(auth()->user()->jobOffers->isEmpty())
            <p class="text-gray-600">Você ainda não criou nenhuma oferta.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(auth()->user()->jobOffers as $jobOffer)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <h2 class="text-xl font-semibold text-brown-600">{{ $jobOffer->title }}</h2>
                        <p class="text-gray-600">Salário: {{ $jobOffer->salary_range }}</p>
                        <p class="text-gray-600">Status: <span class="capitalize {{ $jobOffer->status === 'publish' ? 'text-green-600' : 'text-yellow-600' }}">{{ $jobOffer->status }}</span></p>
                        <p class="text-gray-600">Expira em: {{ $jobOffer->expires_at->format('d/m/Y') }}</p>
                        <div class="mt-4 flex space-x-2">
                            <a href="{{ route('job-offers.edit', $jobOffer->id) }}" class="text-brown-600 hover:underline">Editar</a>
                            <form action="{{ route('job-offers.destroy', $jobOffer->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

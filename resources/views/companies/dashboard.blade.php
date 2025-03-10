@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-brown-600 mb-4">Bem-vindo, Empresa {{ auth()->user()->name }}!</h1>
        <a href="{{ route('job-offers.create') }}" class="bg-brown-600 text-white px-4 py-2 rounded hover:bg-brown-700 mb-6 inline-block">Nova Oferta</a>
        @if(auth()->user()->jobOffers->isEmpty())
            <p class="text-gray-600">Você ainda não criou nenhuma oferta.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach(auth()->user()->jobOffers as $jobOffer)
                    <div class="bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-brown-600">{{ $jobOffer->title }}</h2>
                        <p class="text-gray-600">Salário: {{ $jobOffer->salary_range }}</p>
                        <p class="text-gray-600">Status: {{ $jobOffer->status }}</p>
                        <p class="text-gray-600">Expira em: {{ $jobOffer->expires_at->format('d/m/Y') }}</p>
                        <div class="mt-2 space-x-2">
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

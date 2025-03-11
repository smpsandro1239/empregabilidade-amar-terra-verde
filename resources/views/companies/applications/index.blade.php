@extends('layouts.app')

@section('title', 'Candidaturas Recebidas')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-brown-600 mb-4">Candidaturas Recebidas</h1>
        @if($applications->isEmpty())
            <p class="text-gray-600">Nenhuma candidatura recebida ainda.</p>
        @else
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-brown-600 text-white">
                        <tr>
                            <th class="p-4 text-left">Aluno</th>
                            <th class="p-4 text-left">Oferta</th>
                            <th class="p-4 text-left">Data</th>
                            <th class="p-4 text-left">Mensagem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr class="border-b">
                                <td class="p-4">{{ $application->user->profile->full_name }}</td>
                                <td class="p-4">{{ $application->jobOffer->title }}</td>
                                <td class="p-4">{{ $application->applied_at->format('d/m/Y') }}</td>
                                <td class="p-4">{{ $application->message ?? 'Sem mensagem' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

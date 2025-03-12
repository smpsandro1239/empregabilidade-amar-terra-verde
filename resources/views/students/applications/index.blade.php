@extends('layouts.app')
@section('title', 'Minhas Candidaturas')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Minhas Candidaturas</h1>
        @if($applications->isEmpty())
            <p class="text-gray-600">Você ainda não se candidatou a nenhuma oferta.</p>
        @else
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-brown-600 text-white">
                        <tr>
                            <th class="p-4 text-left">Oferta</th>
                            <th class="p-4 text-left">Empresa</th>
                            <th class="p-4 text-left">Data</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-left">Mensagens</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-4">{{ $application->jobOffer->title }}</td>
                                <td class="p-4">{{ $application->jobOffer->user->profile->company_name }}</td>
                                <td class="p-4">{{ $application->applied_at->format('d/m/Y') }}</td>
                                <td class="p-4 capitalize {{ $application->status === 'accepted' ? 'text-green-600' : ($application->status === 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">{{ $application->status }}</td>
                                <td class="p-4">
                                    <a href="{{ route('messages.index', $application->id) }}" class="text-brown-600 hover:underline">Conversar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

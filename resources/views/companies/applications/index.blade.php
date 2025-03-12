@extends('layouts.app')
@section('title', 'Candidaturas Recebidas')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Candidaturas Recebidas</h1>
        @if($applications->isEmpty())
            <p class="text-gray-600">Nenhuma candidatura recebida ainda.</p>
        @else
            <div class="bg-white rounded-lg shadow-md overflow-x-auto">
                <table class="w-full table-auto">
                    <thead class="bg-brown-600 text-white">
                        <tr>
                            <th class="p-4 text-left">Aluno</th>
                            <th class="p-4 text-left">Oferta</th>
                            <th class="p-4 text-left">Data</th>
                            <th class="p-4 text-left">Mensagem</th>
                            <th class="p-4 text-left">Currículo</th>
                            <th class="p-4 text-left">Status</th>
                            <th class="p-4 text-left">Ações</th>
                            <th class="p-4 text-left">Mensagens</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $application)
                            <tr class="border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-4">{{ $application->user->profile->full_name }}</td>
                                <td class="p-4">{{ $application->jobOffer->title }}</td>
                                <td class="p-4">{{ $application->applied_at->format('d/m/Y') }}</td>
                                <td class="p-4">{{ $application->message ?? 'Nenhuma mensagem' }}</td>
                                <td class="p-4">
                                    @if($application->resume_file_path)
                                        <a href="{{ asset('storage/' . $application->resume_file_path) }}" target="_blank" class="text-brown-600 hover:underline">Download</a>
                                    @else
                                        Nenhum
                                    @endif
                                </td>
                                <td class="p-4 capitalize {{ $application->status === 'accepted' ? 'text-green-600' : ($application->status === 'rejected' ? 'text-red-600' : 'text-yellow-600') }}">{{ $application->status }}</td>
                                <td class="p-4">
                                    @if($application->status === 'pending')
                                        <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="accepted">
                                            <button type="submit" class="text-green-600 hover:underline">Aceitar</button>
                                        </form>
                                        <form action="{{ route('applications.updateStatus', $application->id) }}" method="POST" class="inline ml-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="text-red-600 hover:underline">Rejeitar</button>
                                        </form>
                                    @endif
                                </td>
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

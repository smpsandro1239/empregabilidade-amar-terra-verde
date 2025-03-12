@extends('layouts.app')
@section('title', 'Mensagens')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Mensagens - {{ $application->jobOffer->title }}</h1>
        <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
            <div class="h-96 overflow-y-auto space-y-4" id="chat">
                @foreach($messages as $message)
                    <div class="flex {{ auth()->id() === $message->sender_id ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-xs p-3 rounded-lg {{ auth()->id() === $message->sender_id ? 'bg-brown-600 text-white' : 'bg-gray-200 text-gray-800' }}">
                            <p>{{ $message->message }}</p>
                            <p class="text-xs mt-1 opacity-75">{{ $message->sent_at->format('d/m H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <form method="POST" action="{{ route('messages.store', $application->id) }}" class="flex space-x-4">
                @csrf
                <textarea name="message" rows="2" class="flex-grow p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" placeholder="Digite sua mensagem"></textarea>
                <button type="submit" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Enviar</button>
            </form>
        </div>
    </div>
    <script>
        Echo.channel('application.{{ $application->id }}')
            .listen('MessageSent', (e) => {
                let chat = document.getElementById('chat');
                chat.innerHTML += `
                    <div class="flex justify-start">
                        <div class="max-w-xs p-3 rounded-lg bg-gray-200 text-gray-800">
                            <p>${e.message.message}</p>
                            <p class="text-xs mt-1 opacity-75">${new Date().toLocaleString('pt-BR', {day: '2-digit', month: '2-digit', hour: '2-digit', minute: '2-digit'})}</p>
                        </div>
                    </div>`;
                chat.scrollTop = chat.scrollHeight;
            });
    </script>
@endsection

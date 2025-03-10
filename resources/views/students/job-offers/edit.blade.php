@extends('layouts.app')

@section('title', 'Editar Oferta')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-brown-600 mb-4">Editar Oferta: {{ $jobOffer->title }}</h1>
        <form method="POST" action="{{ route('job-offers.update', $jobOffer->id) }}" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title', $jobOffer->title) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ old('description', $jobOffer->description) }}</textarea>
                @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="salary_min" class="block text-sm font-medium text-gray-700">Salário Mínimo (€)</label>
                    <input type="number" name="salary_min" id="salary_min" step="0.01" value="{{ old('salary_min', $jobOffer->salary_min) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('salary_min') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div class="flex-1">
                    <label for="salary_max" class="block text-sm font-medium text-gray-700">Salário Máximo (€)</label>
                    <input type="number" name="salary_max" id="salary_max" step="0.01" value="{{ old('salary_max', $jobOffer->salary_max) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('salary_max') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-4">
                <label for="keywords" class="block text-sm font-medium text-gray-700">Palavras-chave</label>
                <input type="text" name="keywords" id="keywords" value="{{ old('keywords', $jobOffer->keywords) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="expires_at" class="block text-sm font-medium text-gray-700">Data de Expiração</label>
                <input type="date" name="expires_at" id="expires_at" value="{{ old('expires_at', $jobOffer->expires_at->format('Y-m-d')) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                @error('expires_at') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-700">Localização</label>
                <input type="text" name="location" id="location" value="{{ old('location', $jobOffer->location) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="mb-4">
                <label for="contract_type" class="block text-sm font-medium text-gray-700">Tipo de Contrato</label>
                <select name="contract_type" id="contract_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="">Selecione</option>
                    <option value="internship" {{ old('contract_type', $jobOffer->contract_type) === 'internship' ? 'selected' : '' }}>Estágio</option>
                    <option value="full-time" {{ old('contract_type', $jobOffer->contract_type) === 'full-time' ? 'selected' : '' }}>Tempo Integral</option>
                    <option value="part-time" {{ old('contract_type', $jobOffer->contract_type) === 'part-time' ? 'selected' : '' }}>Meio Período</option>
                </select>
            </div>
            <button type="submit" class="bg-brown-600 text-white px-4 py-2 rounded hover:bg-brown-700">Atualizar Oferta</button>
        </form>
    </div>
@endsection

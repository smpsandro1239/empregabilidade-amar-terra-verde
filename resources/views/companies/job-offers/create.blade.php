@extends('layouts.app')
@section('title', 'Criar Oferta')
@section('content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-brown-600">Criar Nova Oferta</h1>
        <form method="POST" action="{{ route('job-offers.store') }}" class="bg-white p-6 rounded-lg shadow-md space-y-6">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" required>
                @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="description" id="description" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" required>{{ old('description') }}</textarea>
                @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="salary_min" class="block text-sm font-medium text-gray-700">Salário Mínimo (€)</label>
                    <input type="number" name="salary_min" id="salary_min" step="0.01" value="{{ old('salary_min') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" required>
                    @error('salary_min') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="salary_max" class="block text-sm font-medium text-gray-700">Salário Máximo (€)</label>
                    <input type="number" name="salary_max" id="salary_max" step="0.01" value="{{ old('salary_max') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" required>
                    @error('salary_max') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label for="keywords" class="block text-sm font-medium text-gray-700">Palavras-chave</label>
                <input type="text" name="keywords" id="keywords" value="{{ old('keywords') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600">
            </div>
            <div>
                <label for="expires_at" class="block text-sm font-medium text-gray-700">Data de Expiração</label>
                <input type="date" name="expires_at" id="expires_at" value="{{ old('expires_at') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600" required>
                @error('expires_at') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Localização</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600">
            </div>
            <div>
                <label for="contract_type" class="block text-sm font-medium text-gray-700">Tipo de Contrato</label>
                <select name="contract_type" id="contract_type" class="mt-1 block w-full p-3 border rounded-lg focus:ring-brown-600 focus:border-brown-600">
                    <option value="">Selecione</option>
                    <option value="internship" {{ old('contract_type') === 'internship' ? 'selected' : '' }}>Estágio</option>
                    <option value="full-time" {{ old('contract_type') === 'full-time' ? 'selected' : '' }}>Tempo Integral</option>
                    <option value="part-time" {{ old('contract_type') === 'part-time' ? 'selected' : '' }}>Meio Período</option>
                </select>
            </div>
            <button type="submit" class="bg-brown-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-brown-700 transition-all duration-300 transform hover:scale-105">Criar Oferta</button>
        </form>
    </div>
@endsection

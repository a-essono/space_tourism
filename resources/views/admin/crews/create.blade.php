<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Constituer un équipage
            </h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium hover:bg-gray-50">
                    Espace admin
                </a>
            </div>
        </div>
    </x-slot>

    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <form action="{{ route('admin.equipes.store') }}" method="post">
        @csrf
        <!-- Rôle (FR) -->
        <div class="ml-6 mr-6">
            <x-label for="role_fr" label="Role (Français)" />
            <input type="text" id="role_fr" name="role_fr" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_fr') }}" required>
            @error('role_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Rôle (EN) -->
        <div class="ml-6 mr-6">
            <x-label for="role_en" label="Role (Anglais)" />
            <input type="text" id="role_en" name="role_en" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_en') }}" required>
            @error('role_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description (FR) -->
        <div class="ml-6 mr-6">
            <x-label for="description_fr" label="Description (Français)" />
            <textarea id="description_fr" name="description_fr" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_fr') }}</textarea>
            @error('description_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Description (EN) -->
        <div class="ml-6 mr-6">
            <x-label for="description_en" label="Description (Anglais)" />
            <textarea id="description_en" name="description_en" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_en') }}</textarea>
            @error('description_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nom -->
        <div class="ml-6 mr-6">
            <x-label for="nom" label="Nom" />
            <input type="text" id="nom" name="nom" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom') }}" required>
            @error('nom')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image (URL) -->
        <div class="ml-6 mr-6">
            <x-label for="image" label="URL de l’image" />
            <input type="url" id="image" name="image" maxlength="100" class="w-full px-3 py-2 border rounded"
                value="{{ old('image') }}" required>
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-6 mt-10">Enregistrer</button>
    </form>
</x-app-layout>
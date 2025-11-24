<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier les informations sur : {{ $crew->nom }}
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

    @if ($crew)
        <a href="{{ route('fr.equipage', $crew) }}" class="underline text-gray-700" target="_blank" rel="noopener">
            Voir en public ↗
        </a>
    @endif

    <form action="{{ route('admin.equipes.update', $crew->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Rôle (FR) -->
        <div class="ml-6 mr-6">
            <x-label for="role_fr" label="Role (Français)" />
            <input type="text" id="role_fr" name="role_fr" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_fr', $crew->role_fr) }}" required>
            @error('role_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Rôle (EN) -->
        <div class="ml-6 mr-6">
            <x-label for="role_en" label="Role (Anglais)" />
            <input type="text" id="role_en" name="role_en" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_en', $crew->role_en) }}" required>
            @error('role_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description (FR) -->
        <div class="ml-6 mr-6">
            <x-label for="description_fr" label="Description (Français)" />
            <textarea id="description_fr" name="description_fr" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_fr', $crew->description_fr) }}</textarea>
            @error('description_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Description (EN) -->
        <div class="ml-6 mr-6">
            <x-label for="description_en" label="Description (Anglais)" />
            <textarea id="description_en" name="description_en" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_en', $crew->description_en) }}</textarea>
            @error('description_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nom -->
        <div class="ml-6 mr-6">
            <x-label for="nom" label="Nom" />
            <input type="text" id="nom" name="nom" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom', $crew->nom) }}" required>
            @error('nom')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image --}}
        <div class="ml-6 mr-6">
            <x-label for="image" label="URL de l’image)" />
            <input type="url" id="image" name="image" maxlength="100" class="w-full px-3 py-2 border rounded"
                value="{{ old('image', $crew->image) }}" required>
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ml-6 mt-10">Modifier</button>
    </form>
</x-app-layout>
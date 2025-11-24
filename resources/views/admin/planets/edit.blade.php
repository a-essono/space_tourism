<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modifier la planète : {{ $planet->nom_fr }}
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

    @if ($errors->any())
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.planetes.update', $planet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Nom (FR) -->
        <div>
            <x-label for="nom_fr" label="Nom (Français)" />
            <input type="text" id="nom_fr" name="nom_fr" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom_fr', $planet->nom_fr) }}" required>
            @error('nom_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Nom (EN) -->
        <div>
            <x-label for="nom_en" label="Nom (Anglais)" />
            <input type="text" id="nom_en" name="nom_en" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom_en', $planet->nom_en) }}" required>
            @error('nom_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description (FR) -->
        <div>
            <x-label for="description_fr" label="Description (Français)" />
            <textarea id="description_fr" name="description_fr" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_fr', $planet->description_fr) }}</textarea>
            @error('description_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Description (EN) -->
        <div>
            <x-label for="description_en" label="Description (Anglais)" />
            <textarea id="description_en" name="description_en" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_en', $planet->description_en) }}</textarea>
            @error('description_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Distance (FR) -->
        <div>
            <x-label for="distance_fr" label="Distance (Français)" />
            <input type="text" step="any" id="distance_fr" name="distance_fr" min="0"
                class="w-full px-3 py-2 border rounded" value="{{ old('distance_fr', $planet->distance_fr) }}" required>
            @error('distance_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Distance (EN) -->
        <div>
            <x-label for="distance_en" label="Distance (Anglais)" />
            <input type="text" step="any" id="distance_en" name="distance_en" min="0"
                class="w-full px-3 py-2 border rounded" value="{{ old('distance_en', $planet->distance_en) }}" required>
            @error('distance_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Durée (FR) -->
        <div>
            <x-label for="duree_fr" label="Durée (Français)" />
            <input type="text" step="any" id="duree_fr" name="duree_fr" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('duree_fr', $planet->duree_fr) }}" required>
            @error('duree_fr')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <!-- Durée (EN) -->
        <div>
            <x-label for="duree_en" label="Durée (Français)" />
            <input type="text" step="any" id="duree_en" name="duree_en" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('duree_en', $planet->duree_en) }}" required>
            @error('duree_en')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Image --}}
        <div>
            <x-label for="image" label="URL de l’image)" />
            <input type="url" id="image" name="image" maxlength="100" class="w-full px-3 py-2 border rounded"
                value="{{ old('image', $planet->image) }}" required>
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-10">Modifier</button>
    </form>
</x-app-layout>
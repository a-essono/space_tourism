<x-layout>
    <x-slot:title>
        Créer une planète
    </x-slot:title>

    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <!-- Message erreurs -->
    @if ($errors->any())
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('planetes.store') }}" method="post">
        @csrf
        <!-- Nom (FR) -->
        <div>
            <x-label for="nom_fr" label="Nom (Français)" />
            <input type="text" id="nom_fr" name="nom_fr" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom_fr') }}" required>
        </div>
        <!-- Nom (EN) -->
        <div>
            <x-label for="nom_en" label="Nom (Anglais)" />
            <input type="text" id="nom_en" name="nom_en" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom_en') }}" required>
        </div>

        <!-- Description (FR) -->
        <div>
            <x-label for="description_fr" label="Description (Français)" />
            <textarea id="description_fr" name="description_fr" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_fr') }}</textarea>
        </div>
        <!-- Description (EN) -->
        <div>
            <x-label for="description_en" label="Description (Anglais)" />
            <textarea id="description_en" name="description_en" maxlength="500" class="w-full px-3 py-2 border rounded"
                required>{{ old('description_en') }}</textarea>
        </div>

        <!-- Distance (FR) -->
        <div>
            <x-label for="distance_fr" label="Distance (Français)" />
            <input type="number" step="any" id="distance_fr" name="distance_fr" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('distance_fr') }}" required>
        </div>
        <!-- Distance (EN) -->
        <div>
            <x-label for="distance_en" label="Distance (Anglais)" />
            <input type="number" step="any" id="distance_en" name="distance_en" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('distance_en') }}" required>
        </div>

        <!-- Durée (FR) -->
        <div>
            <x-label for="duree_fr" label="Durée (Français)" />
            <input type="number" step="any" id="duree_fr" name="duree_fr" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('duree_fr') }}" required>
        </div>
        <!-- Durée (EN) -->
        <div>
            <x-label for="duree_en" label="Durée (Anglais)" />
            <input type="number" step="any" id="duree_en" name="duree_en" min="0" class="w-full px-3 py-2 border rounded"
                value="{{ old('duree_en') }}" required>
        </div>

        <!-- Image (URL) -->
        <div>
            <x-label for="image" label="URL de l’image" />
            <input type="url" id="image" name="image" maxlength="100" class="w-full px-3 py-2 border rounded"
                value="{{ old('image') }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-10">Enregistrer</button>
    </form>
</x-layout>
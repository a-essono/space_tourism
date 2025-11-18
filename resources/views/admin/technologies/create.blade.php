<x-layout>
    <x-slot:title>
        Déployez votre technologie
    </x-slot:title>

    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('admin.technologies.store') }}" method="post">
        @csrf
        <!-- Nom (FR) -->
        <div>
             <x-label for="nom_fr" label="Nom (Français)"/>
            <input type="text" id="nom_fr" name="nom_fr" maxlength="50" class="w-full px-3 py-2 border rounded" value="{{ old('nom_fr') }}" required>
        </div>
        <!-- Nom (EN) -->
        <div>
            <x-label for="nom-en" label="Nom (Anglais)"/>
            <input type="text" id="nom_en" name="nom_en" maxlength="50" class="w-full px-3 py-2 border rounded" value="{{ old('nom_en') }}" required>
        </div>

        <!-- Description (FR) -->
        <div>
            <x-label for="description_fr" label="Description (Français)"/>
            <textarea id="description_fr" name="description_fr" maxlength="500" class="w-full px-3 py-2 border rounded" required>{{ old('description_fr') }}</textarea>
        </div>
        <!-- Description (EN) -->
        <div>
            <x-label for="description_en" label="Description (Anglais)"/>
            <textarea id="description_en" name="description_en" maxlength="500" class="w-full px-3 py-2 border rounded" required>{{ old('description_en') }}</textarea>
        </div>

        <!-- Image (URL) -->
        <div>
            <x-label for="image" label="URL de l’image)"/>
            <input type="url" id="image" name="image" maxlength="100" class="w-full px-3 py-2 border rounded" value="{{ old('image') }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-10">Enregistrer</button>
    </form>
</x-layout>

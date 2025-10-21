<x-layout>
    <x-slot:title>
        Constituer votre équipage
    </x-slot:title>

    <!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('planetes.store') }}" method="post">
        @csrf
        <!-- Nom -->
        <div>
             <x-label for="nom" label="Nom"/>
            <input type="text" id="nom" name="nom" maxlength="50" class="w-full px-3 py-2 border rounded" value="{{ old('nom') }}" required>
        </div>
        <!-- mission de vol (FR) -->
        <div>
            <x-label for="mission_fr" label="Mission (Français)"/>
            <input type="text" id="mission_fr" name="mission_fr" maxlength="50" class="w-full px-3 py-2 border rounded" value="{{ old('mission') }}" required>
        </div>
        <!-- mission de vol (EN) -->
        <div>
            <x-label for="mission_en" label="Mission (Anglais)"/>
            <input type="text" id="mission_en" name="mission_en" maxlength="50" class="w-full px-3 py-2 border rounded" value="{{ old('mission') }}" required>
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

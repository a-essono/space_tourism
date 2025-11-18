<x-layout>
    <x-slot:title>
        Constituer un équipage
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
    <form action="{{ route('admin.equipes.store') }}" method="post">
        @csrf
        <!-- Rôle (FR) -->
        <div>
            <x-label for="role_fr" label="Role (Français)" />
            <input type="text" id="role_fr" name="role_fr" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_fr') }}" required>
        </div>
        <!-- Rôle (EN) -->
        <div>
            <x-label for="role_en" label="Role (Anglais)" />
            <input type="text" id="role_en" name="role_en" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('role_en') }}" required>
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

        <!-- Nom -->
        <div>
            <x-label for="nom" label="Nom" />
            <input type="text" id="nom" name="nom" maxlength="50" class="w-full px-3 py-2 border rounded"
                value="{{ old('nom') }}" required>
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord administratif') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- 🪐 Planètes --}}
            <a href="{{ route('admin.planetes.index') }}" 
               class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 text-center">
                <div class="text-4xl mb-3">🪐</div>
                <h3 class="text-lg font-semibold">Planètes</h3>
                <p class="text-gray-500 text-sm">({{ $planetCount }}) créées</p>
            </a>

            {{-- 👩‍🚀 Équipages --}}
            <a href="{{ route('admin.equipes.index') }}" 
               class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 text-center">
                <div class="text-4xl mb-3">👩‍🚀</div>
                <h3 class="text-lg font-semibold">Équipages</h3>
                <p class="text-gray-500 text-sm">({{ $crewCount }}) membres</p>
            </a>

            {{-- 🛰️ Technologies --}}
            <a href="{{ route('admin.technologies.index') }}" 
               class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 text-center">
                <div class="text-4xl mb-3">🛰️</div>
                <h3 class="text-lg font-semibold">Technologies</h3>
                <p class="text-gray-500 text-sm">({{ $techCount }}) en base</p>
            </a>

        </div>
    </div>
</x-app-layout>

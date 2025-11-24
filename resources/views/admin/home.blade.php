<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de bord administratif :') }}
            </h2>
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}"
                    class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium hover:bg-gray-50">
                    Espace admin
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- 🪐 Planètes --}}
            @can('viewAny', \App\Models\Planet::class)
                <div class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 flex items-center justify-between gap-6">
                    <a href="{{ route('admin.planetes.index') }}"
                        class="bg-gray-50 hover:bg-gray-100 shadow-sm rounded-lg p-6 flex flex-col items-center gap-2 flex-1">
                        <div class="text-4xl mb-3">🪐</div>
                        <h3 class="text-lg font-semibold">Planètes (administrer la liste)</h3>
                        <p class="text-gray-500 text-sm">({{ $planetCount }}) créées</p>
                    </a>

                    <x-link-button href="{{ route('admin.planetes.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Ajouter une planète
                    </x-link-button>
                </div>
            @endcan


            {{-- 👩‍🚀 Équipages --}}
            @can('viewAny', \App\Models\Crew::class)
                <div class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 flex items-center justify-between gap-6">
                    <a href="{{ route('admin.equipes.index') }}"
                        class="bg-gray-50 hover:bg-gray-100 shadow-sm rounded-lg p-6 flex flex-col items-center gap-2 flex-1">
                        <div class="text-4xl mb-3">👩‍🚀</div>
                        <h3 class="text-lg font-semibold">Équipages (administrer la liste)</h3>
                        <p class="text-gray-500 text-sm">({{ $crewCount }}) membres</p>
                    </a>

                    <x-link-button href="{{ route('admin.equipes.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Ajouter un membre
                    </x-link-button>
                </div>
            @endcan


            {{-- 🛰️ Technologies --}}
            @can('viewAny', \App\Models\Technology::class)
                <div class="bg-white hover:bg-gray-100 shadow-md rounded-lg p-6 flex items-center justify-between gap-6">
                    <a href="{{ route('admin.technologies.index') }}"
                        class="bg-gray-50 hover:bg-gray-100 shadow-sm rounded-lg p-6 flex flex-col items-center gap-2 flex-1">
                        <div class="text-4xl mb-3">🛰️</div>
                        <h3 class="text-lg font-semibold">Technologies (administrer la liste)</h3>
                        <p class="text-gray-500 text-sm">({{ $techCount }}) en base</p>
                    </a>

                    <x-link-button href="{{ route('admin.technologies.create') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Ajouter une technologie
                    </x-link-button>
                </div>
            @endcan

        </div>
    </div>
</x-app-layout>
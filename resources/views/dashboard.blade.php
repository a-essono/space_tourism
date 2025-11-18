<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tableau de bord
        </h2>
    </x-slot>
    <div class="py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Carte bienvenue & actions rapides -->
                <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold">Bienvenue, {{ auth()->user()->name }} 👋</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Gérez vos listes et, selon vos droits, l’administration du site.
                    </p>

                    @php
                        $roles = auth()->user()->getRoleNames();
                        $permissions = auth()->user()->getAllPermissions();
                        // Extraire les préfixes avant le point
                        $listTypes = $permissions->map(function ($p) {
                            return explode('.', $p->name)[0];
                        })->unique();

                        // Vérifier s’il y a plus d’un type
                        $multipleLists = $listTypes->count() > 1;
                    @endphp

                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="{{ route('admin.home') }}"
                            class="px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 text-sm">
                            @if ($multipleLists)
                                Voir mes listes
                            @else
                                Voir ma liste
                            @endif
                        </a>
                    </div>
                </div>
                <!-- Carte rôles & capacités -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-sm font-medium text-gray-700">
                        @if ($multipleLists)
                            Mes rôles
                        @else
                            Mon rôle
                        @endif
                    </h3>
                    <div class="mt-2 flex flex-wrap gap-2">
                        {{-- Affichage des rôles --}}
                        @forelse ($roles as $role)
                            <span
                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ strpos($role, '_') !== false ? explode('_', $role)[1] : $role }}:
                                {{ $listTypes->values()->implode(', ')  }}
                            </span>
                        @empty
                            <span class="text-gray-500 text-sm">Aucun rôle</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
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

                    <div class="mt-4 flex flex-wrap gap-2">
                        <a href="{{ route('admin.home') }}"
                            class="px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 text-sm">
                            @if ($userAccess['multiple_types'])
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
                        @if ($userAccess['multiple_types'])
                            Mes rôles
                        @else
                            Mon rôle
                        @endif
                    </h3>
                    <div class="mt-2 flex flex-wrap gap-2">
                        {{-- Affichage des rôles --}}
                        @forelse ($userAccess['role_suffixes'] as $role)
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium bg-indigo-100 text-indigo-800">
                                {{ $role }}: {{ $userAccess['types']->implode(', ') }}
                            </span>
                        @empty
                            <span class="text-gray-500 text-sm">Aucun rôle</span>
                        @endforelse
                    </div>
                </div>
                @can('users.manage')
                    <!-- Carte administration -->
                    <div class="grid grid-cols-1 gap-6">
                        <div class="bg-white rounded-xl shadow p-6">
                            <h3 class="text-sm font-medium text-gray-700">Administration</h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Gérer les utilisateurs.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="{{ route('admin.users.index') }}"
                                    class="px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 text-sm">
                                    Utilisateurs
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>

</x-app-layout>
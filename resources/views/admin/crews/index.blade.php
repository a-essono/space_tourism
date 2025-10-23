<x-layout>
    <x-slot:title>
        Liste des membres d'équipage
    </x-slot:title>
<!-- Message de réussite -->
    @if (session()->has('message'))
        <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
            {{ session('message') }}
        </div>
    @endif
    <div class="container flex justify-center mx-auto relative">
        <div class="flex flex-col w-full">
            <div class="border-b border-gray-200 shadow overflow-x-auto pt-6">
                <div class="flex justify-end mb-4">
                    <x-link-button href="{{ route('equipes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Ajouter un menbre
                    </x-link-button>
                </div>
                <table class="min-w-full bg-white">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-xs text-gray-500">#</th>
                            <th class="px-4 py-2 text-xs text-gray-500">Nom</th>
                            <th class="px-4 py-2 text-xs text-gray-500">Etat</th>
                            <th class="px-4 py-2 text-xs text-gray-500 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($crews as $crew)
                            <tr class="whitespace-nowrap">
                                <td class="px-4 py-4 text-sm text-gray-500">{{ $crew->id }}</td>
                                <td class="px-4 py-4 text-sm font-medium text-gray-900">{{ $crew->nom }}</td>
                                <td class="px-4 py-4">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $crew ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $crew ? 'Créée' : 'A créer' }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 flex justify-center space-x-2">
                                    <x-link-button href="{{ route('fr.equipage', $crew) }}" class="text-blue-600 hover:text-blue-400">
                                        Voir
                                    </x-link-button>
                                    <x-link-button href="{{ route('equipes.edit', $crew) }}" class="text-yellow-600 hover:text-yellow-400">
                                        Modifier
                                    </x-link-button>
                                    <x-link-button delete-cursor color="bg-red-600 hover:bg-red-400" onclick="if (confirm('Voulez-vous vraiment supprimer cette planète ?')) {event.preventDefault(); document.getElementById('destroy{{ $crew->id }}').submit();}">
                                        Supprimer
                                    </x-link-button>
                                    <form id="destroy{{ $crew->id }}" action="{{ route('equipes.destroy', $crew->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>


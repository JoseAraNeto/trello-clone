<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Meus Boards
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form method="POST" action="{{ route('boards.store') }}" class="mb-6 flex gap-2">
                @csrf
                <input type="text" name="name" placeholder="Nome do board"
                    class="rounded-md border-gray-300 shadow-sm" value="{{ old('name') }}" required>
                <x-primary-button>Criar board</x-primary-button>
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </form>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @forelse ($boards as $board)
                    <div class="flex items-center justify-between rounded-lg bg-white p-4 shadow">
                        <a href="#" class="font-medium text-gray-900">
                            {{ $board->name }}
                        </a>
                        <form method="POST" action="{{ route('boards.destroy', $board) }}"
                            onsubmit="return confirm('Excluir este board?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-sm text-red-600 hover:underline">Excluir</button>
                        </form>
                    </div>
                @empty
                    <p class="text-gray-500">Nenhum board ainda. Crie o primeiro acima!</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>

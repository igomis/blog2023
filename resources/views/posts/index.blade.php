<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Listado de posts') }}
        </h2>
    </x-slot>
    <ul class="list-disc list-inside">
        @forelse($posts as $post)
            <li class="pb-2 border-b border-gray-200 mb-4">
                <span class="text-lg text-gray-700">{{ $post->titulo }} ({{$post->autor->email}})</span>

                <a href="{{ route('posts.show', $post) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Ver</a>
                @if (Auth::user())
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                        @method('DELETE')
                        @csrf
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    <a href="{{ route('posts.edit', $post) }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-2">Editar</a>
                @endif
            </li>
        @empty
            <li class="text-gray-700">No hay posts</li>
        @endforelse
    </ul>

    <div class="mt-6">
        {{ $posts->links() }} <!-- Asegúrate de tener un componente de paginación personalizado para Tailwind CSS -->
    </div>
</x-app-layout>

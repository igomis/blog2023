<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nuevo post') }}
        </h2>
    </x-slot>
    <section>
        <form action="{{ route('posts.store') }}" method="POST" class="w-full max-w-lg">
            @csrf
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="titulo" id="titulo" placeholder="Escribe el título aquí" value="{{ old('titulo') }}">
                @if ($errors->has('titulo'))
                    <div class="text-red-500 text-xs italic">
                        {{ $errors->first('titulo') }}
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="contenido" class="block text-gray-700 text-sm font-bold mb-2">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Escribe el contenido aquí">{{ old('contenido')  }}</textarea>
                @if ($errors->has('contenido'))
                    <div class="text-red-500 text-xs italic">
                        {{ $errors->first('contenido') }}
                    </div>
                @endif
            </div>

            <input type="submit" name="enviar" value="Enviar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full focus:outline-none focus:shadow-outline">
            <br>
            <a href="{{ url()->previous() }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded w-full text-center mt-4">Cancelar</a>
        </form>
    </section>
</x-app-layout>

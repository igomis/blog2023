@extends('layouts.plantilla')
@section('titulo', 'Ficha post')
@section('contenido')
    <h1 class="text-2xl font-bold mb-4">{{ $post->titulo }}</h1>
    <section class="mt-4">
        <article class="p-4 bg-white shadow-lg rounded-lg">
            <div class="text-gray-700 text-base">
                {{ $post->contenido }}
            </div>
            <br>
            <footer class="text-gray-600 text-sm">
                Escrito por {{$post->autor->name}} el
                {{ $post->created_at->locale('es_ES')->dayName}},
                {{ $post->created_at->day}} de
                {{ $post->created_at->locale('es_ES')->monthName }} de
                {{ $post->created_at->year}},
                {{ $post->created_at->format('H:m') }} horas
            </footer>
        </article>

        <a href="{{ route('posts.edit', $post) }}" class="mt-4 inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Editar</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
            @method('DELETE')
            @csrf
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>

        <br><br>
        <h3 class="text-xl font-semibold mt-8">Comentarios:</h3>
        @foreach($post->comentarios as $comentario)
            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <div class="text-gray-700 text-base">{{ $comentario->contenido }}</div>
                <footer class="text-gray-600 text-sm">
                    {{$comentario->autor->name}},
                    {{ Carbon\Carbon::parse($comentario->created_at)->format('d/m/y') }}
                </footer>
            </div>
            <br>
        @endforeach

    </section>


@endsection

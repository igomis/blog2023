<nav class="bg-gray-800 p-2 mt-0 w-full">
    <div class="container mx-auto flex justify-between">
        <a class="text-white text-3xl font-bold" href="#">Blog</a>
        <div class="flex items-center space-x-1">
            <a class="py-2 px-2 text-white" href="{{ route('inici') }}">Inicio</a>
            <a class="py-2 px-2 text-white" href="{{ route('posts.index') }}">Listado de posts</a>
            <a class="py-2 px-2 text-white" href="{{ route('posts.create') }}">Nou Post</a>
            <i class="py-2 px-2 text-white"> {{ fechaActual() }}</i>
        </div>
    </div>
</nav>

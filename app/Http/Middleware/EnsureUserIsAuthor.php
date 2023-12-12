<?php

namespace App\Http\Middleware;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('post'); // Asumint que 'post' és el nom del paràmetre de la ruta
        $post = Post::findOrFail($id);

        if (!Auth::check() || $post->autor_id != Auth::id()) {
            // L'usuari no està autenticat o no és l'autor del post
            abort(403, 'Acció no autoritzada.');
        }

        return $next($request);
    }
}

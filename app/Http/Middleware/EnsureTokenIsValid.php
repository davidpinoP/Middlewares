<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');

        if (!$token || $token !== 'your-expected-token') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}

/**Este middleware comprueba si la petición tiene un token válido en la cabecera (Authorization).

Si el token no existe o no es correcto, bloquea el acceso.
Si el token es correcto, deja pasar la petición. */
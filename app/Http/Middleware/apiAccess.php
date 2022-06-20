<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apiAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     * esta funcion se ejecuta antes de entrar al controladores si
     * en caso no tiene  acceso le saldra una salida json con un mensaje de no tener acceso al recurso
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->header('Authorization') !== 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9') { // verifica si tiene el token en el header
            return response()->json(["message"=>"no tienes acceso a este recurso."]);
        }
        return $next($request);
    }
}

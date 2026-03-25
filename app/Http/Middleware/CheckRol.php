<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {


        $user = auth()->user();

        if(!$user){
            return redirect('/login');

        }

        $nisRoles = [
            'administrador' => 1,
            'aprendiz' => 2,
            'auxiliar' => 3,
            'jefe' => 4,
            'instructor' => 5,
            'super_administrador' =>6
        ];

        foreach($roles as $rol){
            if (isset($nisRoles[$rol]) && $user->tbl_roles_administrativos_NIS === $nisRoles[$rol]) {
                return $next($request);
            }
        }

        return redirect('/home');
    }
}

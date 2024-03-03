<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class AutenticacaoMiddleware
{
    public function handle($request, Closure $next)
    {
        
        session_start();
        if(isset($_SESSION['Email']) && $_SESSION['Senha'] != ""){
            return Response('Faça o login na rota correta!');
        }
        else{
            return $next($request);
        }

    }
}

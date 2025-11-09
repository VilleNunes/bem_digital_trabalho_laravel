<?php

// app/Http/Middleware/CheckUserModule.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserModule
{

    public function handle(Request $request, Closure $next, string $moduleName): Response
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if ($user->rule && $user->rule->name === 'admin') {
            return $next($request);
        }

  
        if ($user->hasModules($moduleName)) {
            return $next($request);
        }

     
        abort(403, 'Acesso não autorizado ao módulo: ' . $moduleName);
    }
}
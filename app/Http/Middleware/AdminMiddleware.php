<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Auth::user()->status;
        if ($role == 'admin') 
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('home')->with([
                'status' => 'Tidak mempunyai hak akses'
            ]);
        }
    }
}

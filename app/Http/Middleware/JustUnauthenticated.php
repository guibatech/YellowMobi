<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request as Request;
use \Closure as Closure;
use Illuminate\Support\Facades\Auth as Auth;
use Symfony\Component\HttpFoundation\Response as Response;

class JustUnauthenticated { 

    public function handle(Request $request, Closure $next): Response {

        if (Auth::check()) {

            return redirect()->route('explore');

        }

        return $next($request);

    }

}

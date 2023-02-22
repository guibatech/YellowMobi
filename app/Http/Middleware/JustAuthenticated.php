<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request as Request;
use \Closure as Closure;
use Illuminate\Support\Facades\Auth as Auth;

class JustAuthenticated {

    public function handle(Request $request, Closure $next) {

        if (!Auth::check()) {

            dd('You are not logged in.');

        }

        return $next($request);

    }

}

<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request as Request;
use \Closure as Closure;
use Illuminate\Support\Facades\Auth as Auth;

class JustAuthenticated {

    public function handle(Request $request, Closure $next) {

        if (!Auth::check()) {

            return redirect()->route('accounts.signin');

        }

        return $next($request);

    }

}

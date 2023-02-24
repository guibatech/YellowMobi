<?php

namespace App\Http\Middleware;

use \Closure as Closure;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth as Auth;
use Symfony\Component\HttpFoundation\Response as Response;

class OnlyNonActivatedAccounts {

    public function handle(Request $request, Closure $next): Response {

        if (Auth::check()) {

            if (Auth::user()->activation_at != null) {

                return redirect()->route('explore');

            }

            return $next($request);

        }

    }

}

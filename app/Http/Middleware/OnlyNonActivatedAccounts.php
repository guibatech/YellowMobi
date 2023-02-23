<?php

namespace App\Http\Middleware;

use \Closure as Closure;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth as Auth;

class OnlyNonActivatedAccounts {

    public function handle(Request $request, Closure $next) {

        if (Auth::check()) {

            if (Auth::user()->activation_at != null) {

                return redirect()->route('explore');

            }

            return $next($request);

        }

    }

}

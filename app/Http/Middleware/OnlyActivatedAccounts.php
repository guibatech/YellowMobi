<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request as Request;
use \Closure as Closure;
use Illuminate\Support\Facades\Auth as Auth;

class OnlyActivatedAccounts {

    public function handle(Request $request, Closure $next) {

        if (Auth::check()) {

            if (Auth::user()->activation_at == null) {

                return redirect()->route('accounts.activate');

            }

            return $next($request);

        }

    }

}

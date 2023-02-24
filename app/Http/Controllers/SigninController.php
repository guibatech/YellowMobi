<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;

class SigninController extends Controller {

    public function create(): Response {

        return response()->view('SigninController.create', [], 200);

    }

    public function store(Request $request): RedirectResponse {

        dd('do sign in', $request);

    }

}

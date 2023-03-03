<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;

class PasswordController extends Controller {

    public function edit(string $token): Response {

        dd("password edit form.", $token);

    }

    public function update(Request $request, string $token): RedirectResponse {

        dd($request, $token);

    }

}

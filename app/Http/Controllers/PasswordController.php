<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;

class PasswordController extends Controller {

    public function edit(string $token): Response {

        return response()->view('PasswordController.edit', [
            'token' => $token,
            'validToken' => true,
        ], 200);

    }

    public function update(Request $request, string $token): RedirectResponse {

        dd($request, $token);

    }

}

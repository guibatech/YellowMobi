<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;
use App\Models\UserAccount as UserAccount;

class PasswordController extends Controller {

    public function edit(string $token, Request $request): Response {

        return response()->view('PasswordController.edit', [
            'token' => $token,
            'validToken' => true,
        ], 200);

    }

    public function update(Request $request, string $token): RedirectResponse {

        $userFound = UserAccount::where("forgot_token", "=", $token)->first();

        if ($userFound == null) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Invalid password reset token.',
            ]);

        }

        dd($userFound, $token, $request);

    }

}

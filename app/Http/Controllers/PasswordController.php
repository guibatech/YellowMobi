<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;
use App\Models\UserAccount as UserAccount;
use App\Traits\TimeTrait as TimeTrait;
use App\Models\UserActivity as UserActivity;
use Illuminate\Support\Facades\Session as Session;
use \Exception as Exception;

class PasswordController extends Controller {

    use TimeTrait;

    public function edit(string $token, Request $request): Response {

        return response()->view('PasswordController.edit', [
            'token' => $token,
            'validToken' => true,
        ], 200);

    }

    public function update(Request $request, string $token): RedirectResponse {

        try {

            $userFound = UserAccount::where("forgot_token", "=", $token)->first();

            if ($userFound == null) {

                return redirect()->back()->withInput()->withErrors([
                    'system' => 'Invalid password reset token.',
                ]);

            }

            $elapsedTime = $this->elapsedTime($userFound->forgot_token_requested_at, 3600);

            if (!$elapsedTime) {

                return redirect()->back()->withInput()->withErrors([
                    'system' => 'This password reset token is expired. Please, generate a new one.',
                ]);

            }

            $previousPassword = $userFound->password;

            $userFound->password = $request->password;
            $userFound->forgot_token = null;
            $userFound->forgot_token_requested_at = null;
            $userFound->save();

            UserActivity::quickActivity("The account access password has been reset. Previous password: {$previousPassword}. New password: {$userFound->password}. Token used: {$token}.", "The account access password has been reset. Previous password: {$previousPassword}. New password: {$userFound->password}. Token used: {$token}.", $userFound->id);
            
            Session::flash("success", "The account access password has been reset.");
            
            return redirect()->route('accounts.signin')->withInput();

        } catch(Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to reset your password.',
            ]);

        }

    }

}

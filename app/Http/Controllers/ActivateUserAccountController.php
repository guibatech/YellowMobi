<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Http\Requests\ActivationRequest as ActivationRequest;
use Illuminate\Support\Facades\Auth as Auth;
use \DateTime as DateTime;
use App\Models\UserActivity as UserActivity;
use Illuminate\Support\Facades\Session as Session;
use \Exception as Exception;

class ActivateUserAccountController extends Controller {

    public function edit(): Response {

        return response()->view('ActivateUserAccountController.edit', [], 200);

    }

    public function update(ActivationRequest $request): RedirectResponse {

        try {
            
            $digits = [];
        
            foreach ($request->input() as $inputName => $inputValue) {

                if (preg_match("/^(digit_){1}[0-9]+$/", $inputName)) {

                    $digits[$inputName] = $inputValue;

                }

            }

            $digits = implode("", $digits);

            if ($digits != Auth::user()->activation_token) {

                UserActivity::quickActivity("Invalid activation attempt.", "Activation attempt with invalid token. Token: {$digits}.", Auth::user()->id);

                return redirect()->back()->withInput()->withErrors([
                    'system' => "Invalid activation token.",
                ]);

            }

            Auth::user()->activation_at = new DateTime('now');
            Auth::user()->save();

            $activationToken = Auth::user()->activation_token;
            UserActivity::quickActivity('Account activated.', "Account was activated with token {$activationToken}.", Auth::user()->id);

            Session::flash("activated-account", "Congratulations! Your account has been activated.");
        
            return redirect()->route('explore');

        } catch (Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to activate your account.',
            ]);

        }   

    }

    public function resendActivationToken(): RedirectResponse {

        dd('create and resend a new activation token to authenticated user..');

    }

}

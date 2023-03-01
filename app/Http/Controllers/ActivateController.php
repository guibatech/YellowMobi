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
use App\Traits\GenerateActivationTokenTrait as GenerateActivationTokenTrait;
use App\Jobs\SendWelcomeEmail as SendWelcomeEmail;

class ActivateController extends Controller {

    use GenerateActivationTokenTrait;

    public function edit(): Response {

        return response()->view('ActivateController.edit', [], 200);

    }

    public function update(ActivationRequest $request): RedirectResponse {

        try {
            
            $reconstructedToken = "";
        
            foreach ($request->input() as $inputName => $inputValue) {

                if (preg_match("/^(digit_){1}[0-9]+$/", $inputName)) {

                    $reconstructedToken .= $inputValue;

                }

            }

            if ($reconstructedToken != Auth::user()->activation_token) {

                UserActivity::quickActivity("Invalid activation attempt.", "Activation attempt with invalid token. Token: {$reconstructedToken}.", Auth::user()->id);

                return redirect()->back()->withInput()->withErrors([
                    'system' => "Invalid activation token.",
                ]);

            }

            Auth::user()->activation_at = new DateTime('now');
            Auth::user()->save();

            UserActivity::quickActivity('Account activated.', "Account was activated with token {$reconstructedToken}.", Auth::user()->id);

            Session::flash("activated-account", "Congratulations! Your account has been activated.");
        
            return redirect()->route('explore');

        } catch (Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to activate your account.',
            ]);

        }   

    }

    public function resendActivationToken(): RedirectResponse {

        try {
            
            $lastRequest = strtotime("now") - strtotime(Auth::user()->activation_token_requested_at);
            $secondsToWait = 180;

            if ($lastRequest < $secondsToWait) {

                $timeLeft = date("i:s", ($secondsToWait - $lastRequest));
                return redirect()->back()->withInput()->withErrors([
                    'system' => "Wait {$timeLeft} to request a new activation token.",
                ]);

            }

            $newToken = $this->generateActivationToken(11111, 99999);
            Auth::user()->activation_token = $newToken;
            Auth::user()->activation_token_requested_at = new DateTime("now");
            Auth::user()->save();

            UserActivity::quickActivity("Resend: a activation token was requested. Token: {$newToken}.", "Resend: a activation token was requested. Token: {$newToken}.", Auth::user()->id);

            SendWelcomeEmail::dispatch(Auth::user()->email, Auth::user()->profile->name, Auth::user()->username, $newToken, Auth::user()->id);
            Session::flash('resend', 'A new activation token has been sent to your email.');

            return redirect()->back()->withInput();

        } catch(Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to generate a new activation token. Try again later.',
            ]);

        }
        
    }

}

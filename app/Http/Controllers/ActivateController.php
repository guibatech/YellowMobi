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
use App\Traits\TokenTrait as TokenTrait;
use App\Jobs\SendWelcomeEmail as SendWelcomeEmail;
use App\Traits\TimeTrait as TimeTrait;

class ActivateController extends Controller {

    use TokenTrait, TimeTrait;

    public function edit(): Response {

        return response()->view('ActivateController.edit', [], 200);

    }

    public function update(ActivationRequest $request): RedirectResponse {

        try {
            
            $reconstructedToken = $this->rebuildToken($request->all());

            if ($reconstructedToken != Auth::user()->activation_token) {

                UserActivity::quickActivity("Account activation attempt with invalid token. Token: {$reconstructedToken}.", "Account activation attempt with invalid token. Token: {$reconstructedToken}.", Auth::user()->id);

                return redirect()->back()->withInput()->withErrors([
                    'system' => "Invalid activation token.",
                ]);

            }

            Auth::user()->activation_at = new DateTime('now');
            Auth::user()->save();

            UserActivity::quickActivity("Account was activated with token {$reconstructedToken}.", "Account was activated with token {$reconstructedToken}.", Auth::user()->id);

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
            
            $remainingTime = $this->remainingTime(Auth::user()->activation_token_requested_at, 180);

            if ($remainingTime != null) {

                return redirect()->back()->withInput()->withErrors([
                    'system' => $remainingTime,
                ]);

            }

            $newToken = $this->generateToken(5);
            Auth::user()->activation_token = $newToken;
            Auth::user()->activation_token_requested_at = new DateTime("now");
            Auth::user()->save();

            UserActivity::quickActivity("Resend: a activation token was requested. Token: {$newToken}.", "Resend: a activation token was requested. Token: {$newToken}.", Auth::user()->id);

            SendWelcomeEmail::dispatch(Auth::user()->email, Auth::user()->profile->name, Auth::user()->username, $newToken, Auth::user()->id)->onQueue('default');
            Session::flash('resend', 'A new activation token has been sent to your email.');

            return redirect()->back()->withInput();

        } catch(Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                'system' => 'Unable to generate a new activation token. Try again later.',
            ]);

        }
        
    }

}

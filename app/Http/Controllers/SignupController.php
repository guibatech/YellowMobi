<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Models\UserAccount as UserAccount;
use App\Http\Requests\SignupRequest as SignupRequest;
use App\Models\UserProfile as UserProfile;
use \Exception as Exception;
use App\Models\UserActivity as UserActivity;
use Illuminate\Support\Facades\Auth as Auth;
use App\Jobs\SendWelcomeEmail as SendWelcomeEmail;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Support\Facades\Session as Session;
use App\Traits\GenerateActivationTokenTrait as GenerateActivationTokenTrait;
use \DateTime as DateTime;
use App\Traits\SigninTrait as SigninTrait;

class SignupController extends Controller {

    use GenerateActivationTokenTrait, SigninTrait;

    public function create(): Response {

        return response()->view('SignupController.create', [], 200);

    }

    public function store(SignupRequest $request): RedirectResponse {
        
        try {
            
            $userAccount = new UserAccount();
            $userAccount->email = $request->email;
            $userAccount->username = $request->username;
            $userAccount->password = $request->password;
            $userAccount->activation_token = $this->generateActivationToken(11111, 99999);
            $userAccount->activation_token_requested_at = new DateTime("now");
            $userAccount->save();
            
            $userProfile = new UserProfile();
            $userProfile->date_of_birth = $request->dateOfBirth;
            $userProfile->user_id = $userAccount->id;
            $userProfile->name = $request->name;
            $userProfile->save();
            
            UserActivity::quickActivity("Account created.", "Account created.", $userAccount->id);
            UserActivity::quickActivity("A activation token was requested. Token: {$userAccount->activation_token}.", "A activation token was requested. Token: {$userAccount->activation_token}.", $userAccount->id);
            
            SendWelcomeEmail::dispatch($userAccount->email, $userProfile->name, $userAccount->username, $userAccount->activation_token, $userAccount->id)->onQueue('default');
            
            return $this->signinAttempt('@'.$userAccount->username, $request->password, "explore", "Unable to signin.", "Logged in (automatic).", "Logged in (automatic).");
            
        } catch (Exception $e) {
            
            return redirect()->back()->withInput()->withErrors([
                'system' => "There was some problem. Try again later.",
            ]);
        
        }

    }

}

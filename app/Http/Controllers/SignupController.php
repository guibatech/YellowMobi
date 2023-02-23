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

class SignupController extends Controller {

    public function create() {

        return response()->view('SignupController.create', [], 200);

    }

    public function store(SignupRequest $request) {

        try {
            
            $userAccount = new UserAccount();
            $userAccount->email = $request->email;
            $userAccount->username = $request->username;
            $userAccount->password = $request->password;
            $userAccount->save();

            $userProfile = new UserProfile();
            $userProfile->date_of_birth = $request->dateOfBirth;
            $userProfile->user_id = $userAccount->id;
            $userProfile->name = $request->name;
            $userProfile->save();

            UserActivity::quickActivity("Created.", "Created.", $userAccount->id);

            if (!Auth::attempt([
                'username' => $request->username,
                'password' => $request->password,
            ])) {

                return redirect()->back()->withInput()->withErrors(['system' => 'Unable to signin.']);

            }

            UserActivity::quickActivity('Logged in.', 'Logged in.', Auth::user()->id);

            SendWelcomeEmail::dispatch($userAccount->email, $userProfile->name, $userAccount->username, $userAccount->activation_token, $userAccount->id)->onQueue('default');
            
            return redirect()->route('explore');

        } catch (Exception $e) {

            return redirect()->back()->withInput()->withErrors(['system' => "There was some problem. Try again later."]);

        }

    }

}

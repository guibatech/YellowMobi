<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Models\UserAccount as UserAccount;
use App\Http\Requests\SignupRequest as SignupRequest;
use App\Models\UserProfile as UserProfile;

class SignupController extends Controller {

    public function create() {

        return response()->view('SignupController.create', [], 200);

    }

    public function store(SignupRequest $request) {

        $userAccount = new UserAccount();
        $userAccount->email = $request->email;
        $userAccount->username = $request->username;
        $userAccount->password = $request->password;
        $userAccount->save();

        if ($userAccount->id == null) {

            return redirect()->back()->withInput()->withErrors(["There was some problem. Try again later."]);

        }

        $userProfile = new UserProfile();
        $userProfile->date_of_birth = $request->dateOfBirth;
        $userProfile->user_id = $userAccount->id;
        $userProfile->name = $request->name;
        $userProfile->save();

    }

}

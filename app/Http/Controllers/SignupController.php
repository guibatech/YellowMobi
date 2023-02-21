<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Models\UserAccount as UserAccount;
use App\Http\Requests\SignupRequest as SignupRequest;

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

    }

}

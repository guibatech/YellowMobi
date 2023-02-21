<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use App\Models\UserAccount as UserAccount;

class SignupController extends Controller {

    public function create() {

        return response()->view('SignupController.create', [], 200);

    }

    public function store(Request $request) {

        $userAccount = new UserAccount();
        $userAccount->email = $request->email;
        $userAccount->username = $request->username;
        $userAccount->password = $request->password;
        $userAccount->save();

    }

}

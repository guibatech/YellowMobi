<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\Request as Request;
use App\Models\UserAccount as UserAccount;

class UserProfileController extends Controller {

    public function show(string $username, Request $request): Response {

        $userFound = UserAccount::where('username', '=', $username)->first();

        return response()->view('UserProfileController.show', [
            'user' => $userFound,
        ], 200);

    }

}

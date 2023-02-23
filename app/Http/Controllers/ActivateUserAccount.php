<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;

class ActivateUserAccount extends Controller {

    public function edit() {

        dd('show activate form.');

    }

    public function update(Request $request) {

        dd('activate account of authenticated user', $request);

    }

    public function resendActivationToken() {

        dd('create and resend a new activation token to authenticated user..');

    }

}

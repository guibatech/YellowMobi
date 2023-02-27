<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;

class ActivateUserAccountController extends Controller {

    public function edit(): Response {

        dd('show activate form.');

    }

    public function update(Request $request): RedirectResponse {

        dd('activate account of authenticated user', $request);

    }

    public function resendActivationToken(): RedirectResponse {

        dd('create and resend a new activation token to authenticated user..');

    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Http\Requests\ActivationRequest as ActivationRequest;

class ActivateUserAccountController extends Controller {

    public function edit(): Response {

        return response()->view('ActivateUserAccountController.edit', [], 200);

    }

    public function update(ActivationRequest $request): RedirectResponse {

        dd('activate account of authenticated user', $request);

    }

    public function resendActivationToken(): RedirectResponse {

        dd('create and resend a new activation token to authenticated user..');

    }

}

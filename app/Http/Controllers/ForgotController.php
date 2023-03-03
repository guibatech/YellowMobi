<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;

class ForgotController extends Controller {

    public function create(): Response {

        dd("forgot password form.");

    }

    public function store(Request $request): RedirectResponse {

        dd("Generate reset token.", $request);

    }

}

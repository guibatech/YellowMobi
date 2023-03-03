<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;

class ForgotController extends Controller {

    public function create(): Response {

        return response()->view('ForgotController.create', [], 200);

    }

    public function store(Request $request): RedirectResponse {

        dd("Generate reset token.", $request);

    }

}

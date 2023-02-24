<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Http\Requests\SigninRequest as SigninRequest;

class SigninController extends Controller {

    public function create(): Response {

        return response()->view('SigninController.create', [], 200);

    }

    public function store(SigninRequest $request): RedirectResponse {

        dd('do sign in', $request);

    }

}

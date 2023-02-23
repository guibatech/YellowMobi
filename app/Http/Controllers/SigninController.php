<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;

class SigninController extends Controller {

    public function create() {

        return response()->view('SigninController.create', [], 200);

    }

    public function store(Request $request) {

        dd('do sign in', $request);

    }

}

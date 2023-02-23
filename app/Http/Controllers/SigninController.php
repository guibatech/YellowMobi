<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;

class SigninController extends Controller {

    public function create() {

        dd('sign in form.');

    }

    public function store(Request $request) {

        dd('do sign in', $request);

    }

}

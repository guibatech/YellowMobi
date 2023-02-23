<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;

class SigninController extends Controller {

    public function signin() {

        dd('sign in form.');

    }

    public function doSignin(Request $request) {

        dd('do sign in', $request);

    }

}

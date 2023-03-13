<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;

class UserProfileController extends Controller {

    public function show(string $username): Response {

        dd($username);

    }

}

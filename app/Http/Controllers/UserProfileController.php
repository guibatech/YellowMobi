<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\Request as Request;

class UserProfileController extends Controller {

    public function show(string $username, Request $request): Response {

        dd($username, $request);

    }

}

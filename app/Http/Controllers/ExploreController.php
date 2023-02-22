<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth as Auth;

class ExploreController extends Controller {

    public function explore() {

        dd('This is the explore.', Auth::user());

    }

} 

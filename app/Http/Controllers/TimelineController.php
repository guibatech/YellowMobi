<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth as Auth;

class TimelineController extends Controller {

    public function timeline() {

        dd('This is the timeline.', Auth::user());

    }

} 

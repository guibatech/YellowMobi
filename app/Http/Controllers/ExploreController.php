<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Http\Response as Response;

class ExploreController extends Controller {

    public function show(): Response {

        return response()->view('ExploreController.show', [], 200);

    }

} 

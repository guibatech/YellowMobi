<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\UserActivity as UserActivity;

class SignoutController extends Controller {

    public function destroy() {

        $user = Auth::user()->id;

        Auth::logout();

        if (!Auth::check()) {
            
            UserActivity::quickActivity("Logged out.", "Logged out.", $user);
            return response()->json(['status' => '1']);

        } else {

            return response()->json(['status' => '0']);

        }

    }

}

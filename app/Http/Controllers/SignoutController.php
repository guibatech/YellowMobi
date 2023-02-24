<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\UserActivity as UserActivity;
use Illuminate\Http\JsonResponse as JsonResponse;

class SignoutController extends Controller {

    public function destroy(): JsonResponse {

        $user = Auth::user()->id;

        Auth::logout();

        if (!Auth::check()) {
            
            UserActivity::quickActivity("Logged out (manual).", "Logged out (manual).", $user);
            
            return response()->json(['status' => '1']);

        } else {

            return response()->json(['status' => '0']);

        }

    }

}

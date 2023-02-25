<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use App\Http\Requests\SigninRequest as SigninRequest;
use Illuminate\Support\Facades\Auth as Auth;
use App\Models\UserActivity as UserActivity;
use \Exception as Exception;
use App\Traits\GetCredentialTypeTrait as GetCredentialTypeTrait;

class SigninController extends Controller {

    use GetCredentialTypeTrait;

    public function create(): Response {

        return response()->view('SigninController.create', [], 200);

    }

    public function store(SigninRequest $request): RedirectResponse {

        try {
            
            $credentialType = $this->getCredentialType($request->credential);

            if ($credentialType == 'username') {

                $request->credential = trim($request->credential, '@');

            }

            if (!Auth::attempt([
                $credentialType => $request->credential,
                'password' => $request->password,
            ])) {

                return redirect()->back()->withInput()->withErrors([
                    "system" => "Invalid {$credentialType} or password.",
                ]);

            } else {

                UserActivity::quickActivity('Logged in (manual).', 'Logged in (manual).', Auth::user()->id);

                return redirect()->route('explore');

            }

        } catch (Exception $e) {

            return redirect()->back()->withInput()->withErrors([
                "system" => "There was some problem. Try again later.",
            ]);

        }

    }

}

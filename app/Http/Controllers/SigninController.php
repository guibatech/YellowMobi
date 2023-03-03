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
use App\Models\UserAccount as UserAccount;
use Illuminate\Support\Facades\Session as Session;
use App\Traits\SigninTrait as SigninTrait;
use App\Traits\ClearUsernameTrait as ClearUsernameTrait;

class SigninController extends Controller {

    use GetCredentialTypeTrait, SigninTrait, ClearUsernameTrait;

    public function create(): Response {

        return response()->view('SigninController.create', [], 200);

    }

    public function store(SigninRequest $request): RedirectResponse {

        try {
            
            $credentialType = $this->getCredentialType($request->credential);
            
            if ($credentialType == 'username') {
                
                $request->credential = $this->clearUsername($request->credential);
                
            }
            
            $amountOfCredentials = UserAccount::where($credentialType, "=", $request->credential)->first();
            
            if ($amountOfCredentials == null) {
                
                Session::flash($credentialType, $request->credential);
                
                return redirect()->route('accounts.signup');
                
            }
            
            return $this->signinAttempt($request->input('credential'), $request->password, 'explore', "Invalid {$credentialType} or password.", "Logged in (manual).", "Logged in (manual).");
            
        } catch (Exception $e) {
                
            return redirect()->back()->withInput()->withErrors([
                "system" => "There was some problem. Try again later.",
            ]);
                    
        }
                    
    }

}

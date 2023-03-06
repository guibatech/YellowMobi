<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;
use App\Http\Requests\ForgotRequest as ForgotRequest;
use App\Traits\GetCredentialTypeTrait as GetCredentialTypeTrait;
use App\Traits\ClearUsernameTrait as ClearUsernameTrait;
use App\Models\UserAccount as UserAccount;
use App\Traits\TokenTrait as TokenTrait;
use \DateTime as DateTime;
use App\Models\UserActivity as UserActivity;

class ForgotController extends Controller {

    use GetCredentialTypeTrait, ClearUsernameTrait, TokenTrait;

    private string $appName;

    public function __construct() {

        $this->appName = config('app.name');

    }
    
    public function create(): Response {
        
        return response()->view('ForgotController.create', [], 200);
        
    }
    
    public function store(ForgotRequest $request): RedirectResponse {
        
        $credentialType = $this->getCredentialType($request->credential); 
        
        if ($credentialType == "username") {
            
            $request->credential = $this->clearUsername($request->credential);
            
        }
        
        $userFound = UserAccount::where($credentialType, "=", $request->credential)->first();
        
        if ($userFound == null) {
            
            return redirect()->back()->withInput()->withErrors([
                'system' => "The {$credentialType} provided is not a {$this->appName} account.",
            ]);
            
        }
        
        $newToken = $this->generateToken(5);
        
        $userFound->forgot_token = $newToken;
        $userFound->forgot_token_requested_at = new DateTime("now");
        $userFound->save();
        
        UserActivity::quickActivity("A password reset token was requested. Token: {$newToken}.", "A password reset token was requested. Token: {$newToken}.", $userFound->id);
        
        // enviar o token por email para o endereço de email vinculado à conta do usuário
        // Registrar o envio do e-mail

        // Evitar SPAM de geração de token.

        dd("Generate reset token.", $request);

    }

}

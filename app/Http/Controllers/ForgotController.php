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

class ForgotController extends Controller {

    use GetCredentialTypeTrait, ClearUsernameTrait;

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

        // Gerar um token seguro de redefinição de senha com validade
        // Guardar o token gerado no banco de dados
        // enviar o token por email para o endereço de email vinculado à conta do usuário

        // Evitar SPAM de geração de token.

        dd("Generate reset token.", $request);

    }

}

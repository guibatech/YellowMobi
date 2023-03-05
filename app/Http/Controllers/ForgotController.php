<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;
use App\Http\Requests\ForgotRequest as ForgotRequest;
use App\Traits\GetCredentialTypeTrait as GetCredentialTypeTrait;
use App\Traits\ClearUsernameTrait as ClearUsernameTrait;

class ForgotController extends Controller {

    use GetCredentialTypeTrait, ClearUsernameTrait;

    public function create(): Response {

        return response()->view('ForgotController.create', [], 200);

    }

    public function store(ForgotRequest $request): RedirectResponse {

        if ($this->getCredentialType($request->credential) == "username") {

            $request->credential = $this->clearUsername($request->credential);

        }

        // Checar se a credencial existe
        // Gerar um token seguro de redefinição de senha com validade
        // Guardar o token gerado no banco de dados
        // enviar o token por email para o endereço de email vinculado à conta do usuário

        // Evitar SPAM de geração de token.

        dd("Generate reset token.", $request);

    }

}

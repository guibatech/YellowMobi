<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Response as Response;
use Illuminate\Http\RedirectResponse as RedirectResponse;
use Illuminate\Http\Request as Request;
use App\Http\Requests\ForgotRequest as ForgotRequest;

class ForgotController extends Controller {

    public function create(): Response {

        return response()->view('ForgotController.create', [], 200);

    }

    public function store(ForgotRequest $request): RedirectResponse {

        // Checar se o campo da credencial está preenchido e é válido
        // Checar se a credencial é email ou username
        // Se for username, retirar o @
        // Checar se a credencial existe
        // Gerar um token seguro de redefinição de senha com validade
        // Guardar o token gerado no banco de dados
        // enviar o token por email para o endereço de email vinculado à conta do usuário

        // Evitar SPAM de geração de token.

        dd("Generate reset token.", $request);

    }

}

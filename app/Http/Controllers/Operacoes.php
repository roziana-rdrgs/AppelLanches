<?php

namespace App\Http\Controllers;

use App\Operacao;
use  Illuminate\Http\Request;

class Operacoes extends BaseController
{
    public $classe = Operacao::class;

    public function create(Request $request)
    {
        try {
            $responseOperacoes = parent::create($request);
            /* controle de saldo e movimentos aqui  */
            return $responseOperacoes;

        } catch (\Exception $th) {
            parent::tratarErro($th);
        }
    }
}

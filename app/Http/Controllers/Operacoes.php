<?php

namespace App\Http\Controllers;


use App\Operacao;
use  Illuminate\Http\Request;

class Movimentos extends BaseController
{
    public $classe = Operacao::class;

    public function create(Request $request)
    {
        try {
            $responseMovimento = parent::create($request);
            /* controle de saldo e movimentos aqui  */
            return $responseMovimento;

        } catch (\Throwable $th) {
            parent::tratarErro($th);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{

    public $classe;

    public function create(Request $request)
    {
        try {
            return response()
                ->json(
                    [
                        'data' =>
                        $this->classe::create($request->all())->fresh(),
                    ],
                    201
                );
        } catch (\Exception $th) {
            return $this->tratarErro($th);
        }
    }

    public function index(Request $request)
    {
        try {
            return response()->json(['data' => $this->classe::paginate($request->per_page)]);
        } catch (\Exception $th) {
            return $this->tratarErro($th);
        }
    }

    public function show(int $id)
    {
        try {
            $recurso = $this->classe::find($id);
            if (is_null($recurso)) {
                return response()->json('Recurso não encontrado', 204);
            }
            return response()->json(['data' => $recurso]);
        } catch (\Exception $th) {
            return $this->tratarErro($th);
        }
    }

    public function update(int $id, Request $request)
    {
        try {
            $recurso = $this->classe::find($id);

            if (is_null($recurso)) {
                return response()->json([
                    'error' => 'Recurso não encontrado'
                ], 404);
            }
            $recurso->fill($request->all());
            $recurso->save();
            return response()->json([
                'data' => $recurso
            ]);
        } catch (\Exception $th) {
            return $this->tratarErro($th);
        }
    }

    public function delete(int $id)
    {
        try {
            $qtdRecursosRemovidos = $this->classe::destroy($id);
            if ($qtdRecursosRemovidos === 0) {
                return response()->json([
                    'error' => 'Recurso não encontrado'
                ], 404);
            }
            return response()->json('', 204);
        } catch (\Exception $th) {
            return $this->tratarErro($th);
        }
    }

    private function tratarErro($erro)
    {
        return response()->json(["error" => $erro->getMessage() . " at " . self::class . ":" . $erro->getLine()], 500);
    }
}

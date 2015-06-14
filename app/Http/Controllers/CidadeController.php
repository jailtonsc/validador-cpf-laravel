<?php

namespace Wempregada\Http\Controllers;

use Illuminate\Http\Request;
use Wempregada\Repositories\Eloquent\CidadeRepository;

class CidadeController extends Controller
{
    private $cidade;

    /**
     * @param CidadeRepository $cidade
     */
    public function __construct(CidadeRepository $cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @param Request $request
     * @return Response Json
     */
    public function getComboDeCidadePorEstado(Request $request)
    {
        return $this->cidade->buscar(['estado_id' => $request['valor']])
            ->list('nome', 'id');
    }
}

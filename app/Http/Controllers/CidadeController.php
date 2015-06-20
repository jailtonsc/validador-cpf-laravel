<?php

namespace Wempregada\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Wempregada\Repositories\Contracts\CidadeRepositoryInterface;

class CidadeController extends Controller
{
    private $cidade;

    /**
     * @param CidadeRepositoryInterface $cidade
     */
    public function __construct(CidadeRepositoryInterface $cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @param Request $request
     * @return Response Json
     */
    public function getComboDeCidadePorEstado(Request $request)
    {
        return Response::json($this->cidade->combo($request['valor']));
    }
}

<?php namespace Wempregada\Http\Controllers;

use Wempregada\Cidade;
use Wempregada\Http\Requests;
use Wempregada\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

	public function comboCidadePorEstado(Request $request, Cidade $cidade)
    {
        return $cidade->allCidades(['estado_id' => $request['valor']]);
    }

}

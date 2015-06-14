<?php namespace Wempregada\Http\Controllers;

use Wempregada\Repositories\Eloquent\PlanoRepository;

class HomeController extends Controller
{
    private $plano;

    public function __construct(PlanoRepository $plano)
    {
        $this->plano = $plano;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $planos = $this->plano->getTodos();
        return view('home.index', compact('planos'));
    }
}

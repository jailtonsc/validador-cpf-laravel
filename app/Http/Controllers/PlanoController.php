<?php namespace Wempregada\Http\Controllers;

use Wempregada\Http\Requests;

use Wempregada\Repositories\Contracts\ItemRepositoryInterface;
use Wempregada\Repositories\Contracts\PlanoRepositoryInterface;

class PlanoController extends Controller
{
    private $plano;
    private $item;

    public function __construct(PlanoRepositoryInterface $plano, ItemRepositoryInterface $item)
    {
        $this->plano = $plano;
        $this->item = $item;
    }

    public function index()
    {
        $planos = $this->plano->getTodos();
        $items  = $this->item->getTodos();
        return view('plano.index', compact('planos', 'items'));
    }
}

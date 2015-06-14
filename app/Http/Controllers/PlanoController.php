<?php namespace Wempregada\Http\Controllers;

use Wempregada\Http\Requests;
use Wempregada\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Wempregada\Plano;
use Wempregada\Item;
use Wempregada\Repositories\Eloquent\ItemRepository;
use Wempregada\Repositories\Eloquent\PlanoRepository;

class PlanoController extends Controller
{
    private $plano;
    private $item;

    public function __construct(PlanoRepository $plano, ItemRepository $item)
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

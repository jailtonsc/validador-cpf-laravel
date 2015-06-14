<?php namespace Wempregada\Http\Controllers;

use Wempregada\Http\Requests;
use Wempregada\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Wempregada\Plano;
use Wempregada\Item;

class PlanoController extends Controller
{
    private $plano;
    private $item;

    public function __construct(Plano $plano, Item $item)
    {
        $this->plano = $plano;
        $this->item = $item;
    }

    public function index()
    {
        $data = [];
        $data['planos'] = $this->plano->allPlanos();
        $data['items'] = $this->item->allItems();

        return view('plano.index', $data);
    }
}

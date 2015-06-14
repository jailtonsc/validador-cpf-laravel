<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    protected $table = 'pais';

    public function combo()
    {
        return $this->orderBy('nome')->get(['id', 'nome']);
    }

}

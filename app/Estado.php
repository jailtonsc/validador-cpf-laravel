<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    protected $table = 'estado';

    public function cidade()
    {
        return $this->hasMany('Wempregada\Cidade');
    }

    public function allEstados()
    {
        return $this->orderBy('nome')->get();
    }

}

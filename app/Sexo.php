<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
	protected $table = 'sexo';

    /**
     * Relacionamentos
     */
    public function user()
    {
        return $this->belongsTo('Wempregada\User');
    }

    /**
     * Diversos tipos de select
     */
    public function allSexos()
    {
        return $this->orderBy('nome')->get();
    }
}

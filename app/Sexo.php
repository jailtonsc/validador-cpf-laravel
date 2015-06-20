<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexo';
    public $timestamps = false;

    /**
     * Relacionamentos
     */
    public function usuario()
    {
        return $this->belongsTo('Wempregada\Usuario');
    }
}

<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'cidade';

    public function estado()
    {
        return $this->belongsTo('Wempregada\Estado');
    }
}

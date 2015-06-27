<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    use SoftDeletes;

    protected $table = 'plano';

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'valor',
        'destaque'
    ];

    public function planoItems()
    {
        return $this->hasMany('Wempregada\PlanoItem');
    }
}
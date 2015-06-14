<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $table = 'item';
    protected $fillable = ['id', 'nome'];

    public function planoItems()
    {
        return $this->hasMany('Wempregada\PlanoItem');
    }

    public function allItems()
    {
        return $this->orderBy('id')->get();
    }
}

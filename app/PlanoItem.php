<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class PlanoItem extends Model
{
    protected $table = 'plano_item';

    protected $fillable = [
        'plano_id',
        'item_id',
        'quantidade'
    ];

    public function plano()
    {
        return $this->belongsTo('Wempregada\Plano');
    }

    public function item()
    {
        return $this->belongsTo('Wempregada\Item');
    }
}

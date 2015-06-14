<?php namespace Wempregada;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model {

	protected $table = 'cidade';

    public function estado()
    {
        return $this->belongsTo('Wempregada\Estado');
    }

    public function allCidades($where = NULL)
    {
        $cidade = $this->orderBy('nome');
        if (is_array($where))
        {
            foreach ($where as $key => $value)
            {
                $cidade->where($key, $value);
            }
        }
        return $cidade->get();
    }

}

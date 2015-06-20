<?php namespace Wempregada\Repositories\Eloquent;

use Wempregada\Cidade;
use Wempregada\Repositories\AbstractRepository;
use Wempregada\Repositories\Contracts\CidadeRepositoryInterface;

class CidadeRepository extends AbstractRepository implements CidadeRepositoryInterface
{
    /**
     * @param Cidade $model
     */
    public function __construct(Cidade $model)
    {
        /** @var Cidade $model */
        $this->model = $model;
    }

    /**
     * @param Int $estadoId
     * @return Model
     */
    public function combo($estadoId)
    {
        return $this->model->where('estado_id', '=', $estadoId)->get(['id', 'nome'])->lists('nome', 'id')->toArray();
    }
}
